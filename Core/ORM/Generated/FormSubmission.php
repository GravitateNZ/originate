<?php

namespace MillenniumFalcon\Core\ORM\Generated;

use MillenniumFalcon\Core\Db\Base;

class FormSubmission extends Base
{
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $title;
    
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $uniqueId;
    
    /**
     * #pz datetime DEFAULT NULL
     */
    private $date;
    
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $fromAddress;
    
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $recipients;
    
    /**
     * #pz mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $content;
    
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $emailStatus;
    
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $emailRequest;
    
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $emailResponse;
    
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $formDescriptorId;
    
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $url;
    
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $ip;
    
    /**
     * #pz text COLLATE utf8mb4_unicode_ci DEFAULT NULL
     */
    private $country;
    
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param mixed title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * @return mixed
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }
    
    /**
     * @param mixed uniqueId
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;
    }
    
    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * @param mixed date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    /**
     * @return mixed
     */
    public function getFromAddress()
    {
        return $this->fromAddress;
    }
    
    /**
     * @param mixed fromAddress
     */
    public function setFromAddress($fromAddress)
    {
        $this->fromAddress = $fromAddress;
    }
    
    /**
     * @return mixed
     */
    public function getRecipients()
    {
        return $this->recipients;
    }
    
    /**
     * @param mixed recipients
     */
    public function setRecipients($recipients)
    {
        $this->recipients = $recipients;
    }
    
    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * @param mixed content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    /**
     * @return mixed
     */
    public function getEmailStatus()
    {
        return $this->emailStatus;
    }
    
    /**
     * @param mixed emailStatus
     */
    public function setEmailStatus($emailStatus)
    {
        $this->emailStatus = $emailStatus;
    }
    
    /**
     * @return mixed
     */
    public function getEmailRequest()
    {
        return $this->emailRequest;
    }
    
    /**
     * @param mixed emailRequest
     */
    public function setEmailRequest($emailRequest)
    {
        $this->emailRequest = $emailRequest;
    }
    
    /**
     * @return mixed
     */
    public function getEmailResponse()
    {
        return $this->emailResponse;
    }
    
    /**
     * @param mixed emailResponse
     */
    public function setEmailResponse($emailResponse)
    {
        $this->emailResponse = $emailResponse;
    }
    
    /**
     * @return mixed
     */
    public function getFormDescriptorId()
    {
        return $this->formDescriptorId;
    }
    
    /**
     * @param mixed formDescriptorId
     */
    public function setFormDescriptorId($formDescriptorId)
    {
        $this->formDescriptorId = $formDescriptorId;
    }
    
    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * @param mixed url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
    
    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }
    
    /**
     * @param mixed ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }
    
    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * @param mixed country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    
}