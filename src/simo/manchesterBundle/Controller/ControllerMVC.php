<?php
namespace simo\manchesterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use simo\manchesterBundle\Entity\Translation;

class ControllerMVC extends Controller
{
      /**
     * @Route("/remplir",name="bd")
     */
     public function RemplirBdAction()
    {  
        return $this->render('simomanchesterBundle:ViewsMVC:hello.html.php');
      
    } 

     /**
     * @Route("/",name="home")
     */
     public function AccueilAction()
    {  
        return $this->render('simomanchesterBundle:ViewsMVC:layout.html.twig');
      
    } 
    
    
    /**
     * @Route("/listez",name="list")
     */
     public function ListezAction()
    {  
         
        $bono=$this->getDoctrine()->getRepository("simomanchesterBundle:Translation")->findAll();
        return $this->render('simomanchesterBundle:ViewsMVC:Listez.html.twig',array('bonono' => $bono));
      
    }   
    
  /**
 * @Route("/modifier/{id}",name="update") 
 */
  
  public function modifierAction(Request $req,$id) {
        $em=$this->getDoctrine()->getManager();
        $bono=$em->getRepository('simomanchesterBundle:Translation')->find($id);
         $form=$this->createFormBuilder($bono)
                ->add('traduction', TextareaType::class)
                ->add('Modifier',SubmitType::class)
                ->getForm();
         $form->handleRequest($req);
        if($form->isValid()){
         $em->merge($bono);
           $em->flush();
           return $this->redirect($this->generateUrl("list"));
        }  
              return $this->render('simomanchesterBundle:ViewsMVC:modifier.html.twig',array('f' => $form->createView(),'bonono'=>$bono));

  } 
  
     /**
     * @Route("/delete/{id}",name="delete")
     */
    public function SupprimerAction(Request $req , $id)
    {
        $em=$this->getDoctrine()->getManager();
        $bono=$em->getRepository('simomanchesterBundle:Translation')->find($id);
         $form=$this->createFormBuilder($bono)
                ->add('traduction', TextareaType::class)
                ->add('Supprimer',SubmitType::class)
                ->getForm();
         $form->handleRequest($req);
        if($form->isValid()){
         $em->remove($bono);
        $em->flush();
         return $this->redirect($this->generateUrl("list"));
         }
        
      return $this->render('simomanchesterBundle:ViewsMVC:supprimer.html.twig',array('f' => $form->createView(),'bonono'=>$bono));
      
    }
    
}