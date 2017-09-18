<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[] paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $userId = $this->Auth->user('id');
        
        $projects = $this->paginate(
        $this->Projects
        ->find('all')
        ->select(['status'=>'ProjectUsers.status'])
        ->select($this->Projects)
        ->join([
            'table' => 'users_projects',
            'alias' => 'ProjectUsers',
            'type' => 'LEFT',
            'conditions' => [ array('ProjectUsers.project_id = Projects.id', 'ProjectUsers.user_id' => $userId) ],     
        ]));

        $this->set(compact('projects'));
        $this->set('_serialize', ['projects']);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $userId = $this->Auth->user('id');
        
        $projects = $this->paginate(
        $this->Projects
        ->find('all')
        ->select([
                'userId'=> 'ProjectUsers.user_id', 
                'fullName'=> 'Users.fullName'
                ])
        ->select($this->Projects)
        ->join([
            'userProjects'=>[
            'table' => 'users_projects',
            'alias' => 'ProjectUsers',
            'conditions' => [ array('ProjectUsers.project_id = Projects.id', 'status'=> 2) ]   
            ],
            'users' => [
                'table' => 'users',
                'alias' => 'Users',
                'conditions' => [ array('ProjectUsers.user_id = Users.id') ]   
                ]
        ]));
        $this->set(compact('projects'));
        $this->set('_serialize', ['projects']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $userId = $this->Auth->user('id');
            $table = $this->loadModel('Users');
            $user = $table->get($userId);

            $project = $this->Projects->patchEntity($project, $this->request->getData());
            $project->supervisor = $user->fullName;
            $project->email = $user->email;
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $skills = $this->Projects->Skills->find('list', ['limit' => 200]);
        $users = $this->Projects->Users->find('list', ['limit' => 200]);
        $majors = $this->Projects->Majors->find('list', ['limit' => 200]);
        
        $this->set(compact('project', 'skills', 'users','majors'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Skills', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $skills = $this->Projects->Skills->find('list', ['limit' => 200]);
        $users = $this->Projects->Users->find('list', ['limit' => 200]);
        $this->set(compact('project', 'skills', 'users'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Apply method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
     public function apply($id = null)
     {
        $project = $this->Projects->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userId = $this->Auth->user('id');
            $table = $this->loadModel('Users');
            $user = $table->get($userId);
            
            $this->Projects->Users->link($project, [$user]);
           
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('Your request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Your request could not be saved. Please, try again.'));
        }
     }

     /**
     * Apply method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
     public function requests($id = null)
     {
        $userId = $this->Auth->user('id');
        
        $projects = $this->paginate(
        $this->Projects
        ->find('all')
        ->select(['status'=>'CASE  ProjectUsers.status
        when 1 THEN "Pending" WHEN 2  THEN "Approved" WHEN 3 THEN "Disapproved" End', 
                'userId'=> 'ProjectUsers.user_id', 
                'fullName'=> 'Users.fullName',
                'skills' => 'GROUP_CONCAT(DISTINCT Skills.title)'
                ])
        ->select($this->Projects)
        ->join([
            'userProjects'=>[
            'table' => 'users_projects',
            'alias' => 'ProjectUsers',
            'conditions' => [ array('ProjectUsers.project_id = Projects.id') ]   
            ],
            'users' => [
                'table' => 'users',
                'alias' => 'Users',
                'conditions' => [ array('ProjectUsers.user_id = Users.id') ]   
                ]
                ,
            'users_skills' => [
                'table' => 'users_skills',
                'alias' => 'UsersSkills',
                'type' => 'LEFT',
                'conditions' => [ array('UsersSkills.user_id = Users.id') ]   
            ],
            'skills' => [
                'table' => 'skills',
                'alias' => 'Skills',
                'conditions' => [ array('UsersSkills.skill_id = Skills.id') ]   
            ],
        ]));
        $this->set(compact('projects'));
        $this->set('_serialize', ['projects']);
     }

     /**
     * Request method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function request($user_id, $project_id)
    {
        $table = $this->loadModel('Users');
        
        $user = $table->get($user_id, [
            'contain' => ['Projects', 'Skills']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['Approve'])) {
                $tablename = TableRegistry::get("Users_Projects");                
                $query = $tablename->query();
                $query->update()
                    ->set(['status' => 2])
                    ->where(['user_id' => $user_id , 'project_id' => $project_id])
                    ->execute();

                $this->Flash->success(__('Project Request Approved '));
            } else if (isset($this->request->data['Disapprove'])) {
                $tablename = TableRegistry::get("Users_Projects");                
                $query = $tablename->query();
                $query->update()
                    ->set(['status' => 3])
                    ->where(['user_id' => $user_id , 'project_id' => $project_id])
                    ->execute();
                $this->Flash->success(__('Project Request Disapproved'));
            }
            return $this->redirect(['action' => 'requests']);
        }
        $majors = $this->Users->Majors->find('list', ['limit' => 200]);
        $interests = $this->Users->Interests->find('list', ['limit' => 200]);
        $projects = $this->Users->Projects->find('list', ['limit' => 200]);
        $skills = $this->Users->Skills->find('list', ['limit' => 200]);
        $positions = $this->Users->Positions->find('list', ['limit' => 200]);
        
        $this->set(compact('user', 'majors', 'interests', 'projects', 'skills','positions'));
        $this->set('_serialize', ['user']);
    }

        /**
     * Delete request method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
     public function deleteRequest($user_id, $project_id)
     {
         $this->request->allowMethod(['post', 'delete']);
         $tablename = TableRegistry::get("Users_Projects");                
         $query = $tablename->query();
         
         if ($query->delete()
         ->where(['user_id' => $user_id , 'project_id' => $project_id])
         ->execute()) {
             $this->Flash->success(__('The request has been deleted.'));
         } else {
             $this->Flash->error(__('The request could not be deleted. Please, try again.'));
         }
 
         return $this->redirect(['action' => 'requests']);
     }
}
