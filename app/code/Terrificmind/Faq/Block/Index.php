<?php
namespace Terrificmind\Faq\Block;
class Index extends \Magento\Framework\View\Element\Template
{

   public function __construct(
      \Magento\Framework\View\Element\Template\Context $context,
      \ Terrificmind\Faq\Model\FrequentlyAskedQuestionFactory $hellotableFactory,
      $data = []
      
    )
   {
    parent::__construct($context, $data);  
    $this->_hellotableFactory = $hellotableFactory;

    
    
   }
   // function to call the get collection it call resourse model 
   public function getTestCollection()
   {
       
       $post = $this->_hellotableFactory->create();
       return  $post->getCollection();
   }

   
   
}
