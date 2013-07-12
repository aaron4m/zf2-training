<?php
namespace News\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class NewsController extends AbstractActionController
{
    public function indexAction()
    {
        $service = $this->getServiceLocator()->get('News\Service\News');
        $articles = $service->getMapper()->findAll();

        /* Session Example
        $session = $this->getServiceLocator()->get('SessionManager');
        $session->test = 'dog';
        */

        return new ViewModel(
            array(
                'articles' => $articles,
            )
        );
    }

    public function addAction()
    {
        if ($this->getRequest()->isPost()) {
            $postData = $this->params()->fromPost();
            $service = $this->getServiceLocator()->get('News\Service\News');
            $service->save($postData);

            $this->redirect()->toRoute('news');
        }

        return new ViewModel();
    }

    public function EditAction()
    {
        $id = $this->params()->fromRoute('id');

        $service = $this->getServiceLocator()->get('News\Service\News');
        $article = $service->getMapper()->findByNewsId($id);

        if ($this->getRequest()->isPost()) {
            $postData = $this->params()->fromPost();
            $service->save($postData);

            $this->redirect()->toRoute('news');
        }

        return new ViewModel(
            array('article'=>$article)
        );
    }

    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id');
        $service = $this->getServiceLocator()->get('News\Service\News');
        $service->delete($id);

        $this->redirect()->toRoute('news');
    }
}
