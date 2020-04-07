<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificminds_ProductVideos
 * @author   Sreeraj N R
 */

namespace Terrificminds\ProductVideos\Controller\Adminhtml\Videos;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Action\Context;  
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory; 

/**
 * Save Controller Action Class
 */
class Save extends \Magento\Framework\App\Action\Action
{
    protected $uploader;
    public function __construct(
        Context $context,
        Filesystem $filesystem,
        UploaderFactory $uploader,
        \Terrificminds\ProductVideos\Model\ProductVideos $prductvideos,
        \Magento\Backend\Model\Session $session,
        \Magento\Framework\Filesystem\Driver\File $file   
    ) 
    {
       
        $this->prductvideos = $prductvideos;
        $this->session = $session;
        $this->_file = $file;
        $this->uploader = $uploader;
        $this->filesystem = $filesystem;
        
        parent::__construct($context);
        $this->mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
    }
    /**
     * Save values to the database
     */
	public function execute()
    {
        $data = $this->getRequest()->getParams();
        if ($data) {            
            $model = $this->prductvideos;
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
            if(isset($data['video_check'])) {
                $videoPath = $this->mediaDirectory->getAbsolutePath($model->getVideoUrl()); 
                if ($this->_file->isExists($videoPath))  {
                    $this->_file->deleteFile($videoPath);
                }
                $data['video_url'] = '';
            }
            
            /**
            * code for saving image url
            */		

            if(isset($_FILES['thumb_nail_image']['name']) && $_FILES['thumb_nail_image']['name'] != '') {
                $yourFolderName = 'your-custom-folder/'; // creates a custom folder in which the selected image is stores.
                try 
                {
                    $target = $this->mediaDirectory->getAbsolutePath($yourFolderName);
                    $uploader = $this->uploader->create(['fileId' => 'thumb_nail_image']);
                    $uploader->setAllowedExtensions(['jpg', 'pdf', 'doc', 'png', 'zip']); // allowable image types
                    $uploader->setAllowCreateFolders(true);     
                    $uploader->setAllowRenameFiles(true);                      
                    $result = $uploader->save($target);
                    $data['thumb_nail_image'] = $yourFolderName.$_FILES['thumb_nail_image']['name']; // saves the image url into data base
           
				} catch (Exception $e) {
                    $data['thumb_nail_image'] = $_FILES['thumb_nail_image']['name'];
                    
			    }
			}
            else{
                if(isset($data['thumb_nail_image']['value']))
                   $data['thumb_nail_image'] = $data['thumb_nail_image']['value'];
            }

            /**
            * code for saving video_url
            */

            if(isset($_FILES['video_url']['name']) && $_FILES['video_url']['name'] != '') {
                $yourFolderName = 'your-video-folder/';
                try 
                {
                    $target = $this->mediaDirectory->getAbsolutePath($yourFolderName);
                    $uploader = $this->uploader->create(['fileId' => 'video_url']);
                    $uploader->setAllowedExtensions(['mp4', '3gp', 'mlv', 'hd']);
                    $uploader->setAllowCreateFolders(true);     
                    $uploader->setAllowRenameFiles(true);                      
                    $result = $uploader->save($target);
                    $data['video_url'] = $yourFolderName.$_FILES['video_url']['name'];  // saves the video url into data base
           
				} catch (Exception $e) {
                    $data['video_url'] = $_FILES['video_url']['name'];
                    
			    }
			}			
            			
            $model->setData($data);		
            try {
                $model->save();
                
                $this->messageManager->addSuccess(__('The Frist Grid Has been Saved.'));
                $this->session->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }
            $this->_redirect('*/*/edit', array('banner_id' => $this->getRequest()->getParam('banner_id')));
            return;
        }
        $this->_redirect('*/*/');
    }
}
