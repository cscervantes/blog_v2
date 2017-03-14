<?php

class CommentsController extends AppController
{
     public $helpers = array('Html', 'Form', 'Flash');

    public $components = array('Flash');

    public $uses = array(
        'PostComment', 'Comment',
    );

    // public function index(){

    //  $this->set('posts', $this->Post->find('all'));
    // }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid comment'));
        }

        $comment = $this->Comment->findById($id);
        if (!$comment) {
            throw new NotFoundException(__('Invalid comment'));
        }
        $this->set('comment', $comment);
    }

    public function add($id){
        if ($this->request->is('post')) {
            // $this->Comment->create();
            // $this->PostComment->create();
            $data = array('user_id' => $this->Auth->User('id'), 'comment' => $this->request->data['Comment']['comment']);
            if ($this->Comment->save($data)) {
            $data2 = array('post_id' => $this->request->data['Comment']['post_id'], 'comment_id' => $this->Comment->getLastInsertId());
            $this->PostComment->save($data2);
            $this->Flash->success(__('Your comment has been saved.'));
            return $this->redirect(array('controller' => 'blogs','action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your comment.'));
        }
        $this->set('id', $id);
    }

    public function edit($id = null){
        if (!$id) {
            throw new NotFoundException(__('Invalid comment'));
        }

        $comment = $this->Comment->findById($id);
        if (!$comment) {
            throw new NotFoundException(__('Invalid comment'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Comment->id = $id;
            if ($this->Comment->save($this->request->data)) {
                $this->Flash->success(__('Your comment has been updated.'));
                return $this->redirect(array('controller' => 'blogs','action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your comment.'));
        }

        if (!$this->request->data) {
            $this->request->data = $comment;
        }
    }

    public function delete($id, $pid) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Comment->delete($id)) {
            $this->PostComment->delete($pid);
            $this->Flash->success(
                __('The comment with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The comment with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('controller' => 'blogs','action' => 'index'));
    }

}