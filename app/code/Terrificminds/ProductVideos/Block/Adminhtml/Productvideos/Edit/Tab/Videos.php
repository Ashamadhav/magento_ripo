<?php
/**
 * Product_Video Module Form Field Management
 * @category  Terrificminds
 * @package   Terrificminds_ProductVideos
 * @author    Terrificminds
 */

namespace Terrificminds\ProductVideos\Block\Adminhtml\Productvideos\Edit\Tab;

class Videos extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
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

    protected function _prepareForm()
    {		
        $model = $this->_coreRegistry->registry('productvideos_productvideos');
		$isElementDisabled = false;
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('page_');
        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('Videos')));
        $isVideoUrl = '';

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
            $isVideoUrl = $model->getVideoUrl();
        }
        /**
         *  Adding form fields 
         */       
        
        $fieldset->addField(        // field for adding title to the product
            'title',
            'text',
            array(
                'name' => 'title',
                'label' => __('Title'),
                'title' => __('title'),
                'required' =>__('true')
            )
        );
        $fieldset->addField(        //  field for uploading image
            'thumb_nail_image',
            'image',
            array(
                'name' => 'thumb_nail_image',
                'label' => __('Image'),
                'title' => __('thumb_nail_image'),
                'note' => '(*.jpg, *.png, *.gif)', 
                'required' =>__('true')               
            )
        );
        $fieldset->addField(       // field for uploading video 
            'video_url',
            'file',
            array(
                'name' => 'video_url',
                'label' => __('Upload Video'),
                'title' => __('video_url'),
                'note' => $isVideoUrl,
            )
        );  
       
        if($isVideoUrl != '') {
            $fieldset->addField(       // field for delete video option 
                'video_check',
                'checkbox',
                array(
                    'name' => 'video_check',
                    'label' => __('Delete Video'),
                    'title' => __('video_url'),            
                    'tabindex' => 1  
                )
            );  
        } 
        $fieldset->addField(        // field for saving video url from youtube 
            'video',
            'text',
            array(
                'name' => 'video',
                'label' => __('Video Url'),
                'title' => __('video'),
            )
        );    
        $fieldset->addField(        //  field for adding video description
            'video_description',
            'textarea',
            array(
                'name' => 'video_description',
                'label' => __('Video Description'),
                'title' => __('video_description'),
                'note' => '(You can add video descriptions here)',
                'maxlength' => 150
            )
        );
        $fieldset->addField(        //  field for saving link to another page
            'link',
            'text',
            array(
                'name' => 'link',
                'label' => __(' Link'),
                'title' => __('link'),  
                'note' => '(If video is not given, instead you can redirect to this page)',             
            )
        );
        $fieldset->addField(        //  field for saving product's sku
            'sku',
            'textarea',
            array(
                'name' => 'sku',
                'label' => __('Sku'),
                'title' => __('sku'),
                'note' => '(You can add multiple sku here)', 
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
        return __('Videos');         
    }
    public function getTabTitle()
    {
        return __('Videos');
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
