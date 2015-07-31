<?php

class WordsController extends AppController
{
	public $helpers = array('Html', 'Form', 'Number', 'Text', 'Session', 'Js');
	public $components = array('Session', 'Paginator', 'RequestHandler');


    public function index()
    {
    	 $this->Paginator->settings = array(
        'conditions' => array('Word.role' => CakeSession::read("Auth.User.username")),
        'limit' => 100
    );

    // similar to findAll(), but fetches paged results
    $data = $this->Paginator->paginate('Word');
    $this->set('words', $data);
        //$this->set('words', $this->paginate('Word'));
    }

	public function word($id = null)
    {
    	if(!isset($id))
		{
			$this->redirect(array('controller' => 'words', 'action' => 'index'));
		}
		else
		{
			$word = $this->Word->findById($id);
			if(!$word)
			{
            	throw new NotFoundException(__('Invalid word'));
        	}
        	$this->set('word', $word);
		}
    }

	public function add()
	{
		if ($this->request->is('post'))
		{
            $this->Word->create();
            if ($this->Word->save($this->request->data))
            {
                $this->Session->setFlash('Your word has been saved.');
                $this->redirect(array('action' => 'add'));
            }
            else
            {
            	// krótka wiadomość przesyłana do widoku
            	$this->Session->setFlash('Unable to add your word.');

				// Niestandardowy layout
                //$this->Session->setFlash('Unable to add your word.', 'flash_custom');
            }
        }
         $this->Paginator->settings = array(
                'conditions' => array('Word.role' => CakeSession::read("Auth.User.username")),
                'limit' => 100
            );
         // similar to findAll(), but fetches paged results
            $data = $this->Paginator->paginate('Word');
            $this->set('words', $data);
                //$this->set('words', $this->paginate('Word'));
	}

	public function remove($id = null)
	{
		$word = $this->Word->findById($id);
		if(!$word)
		{
			//http://book.cakephp.org/2.0/en/development/exceptions.html
        	throw new NotFoundException(__('Invalid post'));
    	}

		$this->Word->delete($id);
		$this->redirect(array('controller' => 'words', 'action' => 'display'));
	}

public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Post is not valid!'));
    }

    $word = $this->Word->findById($id);
    if (!$word) {
        throw new NotFoundException(__('Post is not valid!'));
    }

    if ($this->request->is('post') || $this->request->is('put')) {
        $this->Word->id = $id;
        $post_data = $this->request->data;
        if ($this->Word->save($post_data)) {
            $this->Session->setFlash(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'display'));
        }
        $this->Session->setFlash(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $word;
    }

    $this->Paginator->settings = array(
                    'conditions' => array('Word.role' => CakeSession::read("Auth.User.username")),
                    'limit' => 100
                );
             // similar to findAll(), but fetches paged results
                $data = $this->Paginator->paginate('Word');
                $this->set('words', $data);
                    //$this->set('words', $this->paginate('Word'));
}

public function display()
    {
    	 $this->Paginator->settings = array(
        'conditions' => array('Word.role' => CakeSession::read("Auth.User.username")),
        'limit' => 10
    );

    // similar to findAll(), but fetches paged results
    $data = $this->Paginator->paginate('Word');
    $this->set('words', $data);
        //$this->set('words', $this->paginate('Word'));
    }


    public $paginate = array(
        'order' => array(
            'Word.id' => 'asc'
        )
    );


}

?>
