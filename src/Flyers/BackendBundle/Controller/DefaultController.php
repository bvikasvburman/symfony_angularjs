<?php

namespace Flyers\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Flyers\BackendBundle\Entity\Prject;


/**
 * @Route("/api")
 */
class DefaultController extends Controller
{

    /**
     * @Route("/list")
     */
    public function listAction()
    {
        
        $em = $this->getDoctrine()->getManager();


        /* Read Single Record */

        // $result = $em->getRepository('BackendBundle:Project')->find(1);

        // $data['id']             =  $result->getId();
        // $data['title']          =  $result->getTitle();
        // $data['description']    =  $result->getDescription();

        // return new JsonResponse($data);


        $results = $em->getRepository('BackendBundle:Project')->findAll();

        foreach ($results as $result) {
            $data[]['id']            =  $result->getId();
            $data[]['title']         =  $result->getTitle();
            $data[]['description']    =  $result->getDescription();
        }
        
        return new JsonResponse($data);
        
    }


    /**
     * @Route("/add")
     */
    public function addAction(Request $request)
    {
        
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {

            $title          = $request->request->get('title');
            $description    = $request->request->get('description');

            $em = $this->getDoctrine()->getManager();
            $project = new Project();

            $project->setTitle($title);
            $project->setDescription($description);

            $em->persist($project);
            $em->flush();

            $data['success'] = 1;
            $data['success_message'] = 'Record added successfully!';
            
            return new JsonResponse($data);    
            
        }
        
    }


    /**
     * @Route("/hello")
     */
    public function helloAction()
    {
       
        return new JsonResponse(array('world' => 'Viaks'));
    }

    /**
     * @Route("/todos")
     */
    public function todosAction()
    {
        $todos = array(
            array('text'=>'learn angular', 'done'=>true),
            array('text'=>'build an angular app', 'done'=>false),
            );
        return new JsonResponse($todos);
    }
}
