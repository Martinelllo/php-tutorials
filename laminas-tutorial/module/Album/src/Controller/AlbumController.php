<?php 

namespace Album\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Album\Model\AlbumTable;
use Album\Form\AlbumForm;
use Album\Model\Album;
use Laminas\Http\Request;

class AlbumController extends AbstractActionController 
{

    private $table;

    public function __construct(AlbumTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'albums' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');          // We do this here as we'll want to re-use the form when editing an album and will use a different label

        $request = $this->getRequest();
        assert($request instanceof Request);            // tels inteliphense the instance exists

        if( ! $request->isPost() ) {                    // if no Get request, return a data array to build the form
            return ['form' => $form]; 
        }

        
        $album = new Album();                           // else we have already a form and create a Album from it
        $form->setInputFilter($album->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {                       // if the form is invalid, return the form with the validity information
            return ['form' => $form];
        }

        $album->exchangeArray($form->getData());        // grab the data from the form
        $this->table->saveAlbum($album);
        
        return $this->redirect()->toRoute('album');
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        
        if (0 === $id) {
            return $this->redirect()->toRoute('album', ['action' => 'add']);
        }

        // Retrieve the album with the specified id. Doing so raises
        // an exception if the album is not found, which should result
        // in redirecting to the landing page.
        try {
            $album = $this->table->getAlbum($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('album', ['action' => 'index']);
        }

        $form = new AlbumForm();
        $form->bind($album);                            // binds the form in two ways. after successful validation the data actualizes. expects the getArrayCopy() and exchangeArray() method in the Model
        $form->get('submit')->setAttribute('value', 'Edit'); // set button label (same as above) $form->get('submit')->setValue('Edit');

        $request = $this->getRequest();
        assert($request instanceof Request);            // tels inteliphense the instance exists

        $viewData = ['id' => $id, 'form' => $form];     // build form data with content from the database

        if(! $request->isPost()) {                      // if no request is send, just render the view
            return $viewData;
        }

        $form->setInputFilter($album->getInputFilter());// else check the validity of the request data
        $form->setData($request->getPost());

        if(! $form->isValid()) {                        // if form is invalid, render the form with invalidity-information
            return $viewData;
        }

        try {                                           // else save the changed data with the same id and overwrite the old tableRow
            $this->table->saveAlbum($album);
        } catch (\Exception $e) {
        }

        return $this->redirect()->toRoute('album', ['action' => 'index']);  // Redirect to album list
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album');
        }

        $request = $this->getRequest();
        assert($request instanceof Request);            // tels inteliphense the instance exists

        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deleteAlbum($id);
            }

            return $this->redirect()->toRoute('album'); // Redirect to list of albums
        }

        return [
            'id'    => $id,
            'album' => $this->table->getAlbum($id),
        ];
    }
}


?>