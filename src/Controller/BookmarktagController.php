<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarktag Controller
 *
 * @property \App\Model\Table\BookmarktagTable $Bookmarktag
 *
 * @method \App\Model\Entity\Bookmarktag[] paginate($object = null, array $settings = [])
 */
class BookmarktagController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bookmarks', 'Tags']
        ];
        $bookmarktag = $this->paginate($this->Bookmarktag);

        $this->set(compact('bookmarktag'));
        $this->set('_serialize', ['bookmarktag']);
    }

    /**
     * View method
     *
     * @param string|null $id Bookmarktag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmarktag = $this->Bookmarktag->get($id, [
            'contain' => ['Bookmarks', 'Tags']
        ]);

        $this->set('bookmarktag', $bookmarktag);
        $this->set('_serialize', ['bookmarktag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmarktag = $this->Bookmarktag->newEntity();
        if ($this->request->is('post')) {
            $bookmarktag = $this->Bookmarktag->patchEntity($bookmarktag, $this->request->getData());
            if ($this->Bookmarktag->save($bookmarktag)) {
                $this->Flash->success(__('The bookmarktag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookmarktag could not be saved. Please, try again.'));
        }
        $bookmarks = $this->Bookmarktag->Bookmarks->find('list', ['limit' => 200]);
        $tags = $this->Bookmarktag->Tags->find('list', ['limit' => 200]);
        $this->set(compact('bookmarktag', 'bookmarks', 'tags'));
        $this->set('_serialize', ['bookmarktag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmarktag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmarktag = $this->Bookmarktag->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmarktag = $this->Bookmarktag->patchEntity($bookmarktag, $this->request->getData());
            if ($this->Bookmarktag->save($bookmarktag)) {
                $this->Flash->success(__('The bookmarktag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookmarktag could not be saved. Please, try again.'));
        }
        $bookmarks = $this->Bookmarktag->Bookmarks->find('list', ['limit' => 200]);
        $tags = $this->Bookmarktag->Tags->find('list', ['limit' => 200]);
        $this->set(compact('bookmarktag', 'bookmarks', 'tags'));
        $this->set('_serialize', ['bookmarktag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmarktag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmarktag = $this->Bookmarktag->get($id);
        if ($this->Bookmarktag->delete($bookmarktag)) {
            $this->Flash->success(__('The bookmarktag has been deleted.'));
        } else {
            $this->Flash->error(__('The bookmarktag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
