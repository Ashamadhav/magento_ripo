<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved. 
 * @category Terrificminds Module
 * @package  Terrificmind_Faq
 * @author   Asha
 */
namespace Terrificmind\Faq\Block\Adminhtml\Faq\Edit\Tab;
class Info extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    protected $_systemStore;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = array()
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    /** 
     * function to create form
     */
    protected function _prepareForm()
    {		
        $model = $this->_coreRegistry->registry('post_data');
		$isElementDisabled = false;
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('page_');
        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('FAQ')));
        if ($model->getId()) {
            $fieldset->addField('post_id','hidden', array('name' => 'id'));
            
        }
        /**
         *  Adding form fields 
         */       
        $fieldset->addField(        // field for adding Question to the product
            'question',
            'text',
            array(
                'name' => 'question',
                'label' => __('Question'),
                'title' => __('question'),
                'required' =>__('true')
            )
        );
        $fieldset->addField(        // field for adding Answer to the product
            'answer',
            'text',
            array(
                'name' => 'answer',
                'label' => __('Answer'),
                'title' => __('answer'),
                'required' =>__('true')
            )
        );     
		if (!$model->getId()) {
            $model->setData('status', $isElementDisabled ? '2' : '1');
        }
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();   
    }
    public function getTabLabel()
    {
        return __('FAQ');         
    }
    public function getTabTitle()
    {
        return __('FAQ');
    }
    public function canShowTab()
    {
        return true;
    }
    public function isHidden()
    {
        return false;
    }
}
