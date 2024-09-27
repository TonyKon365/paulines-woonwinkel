<?php

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\CheckBoxField;
use SilverStripe\Control\Email\Email;
use Silverstripe\SiteConfig\SiteConfig;

class FormPageController extends PageController {

    private static $allowed_actions = ['MoreInfoForm', 'OrderForm'];

    // ------------------ MORE INFO ------------------

    public function MoreInfoForm() {

        //Bootstrap
        $row = new LiteralField('row', '<div class="row">');
        $col6 = new LiteralField('col-6', '<div class="col-12 col-md-6">');
        $col12 = new LiteralField('col-12', '<div class="col-12">');
        $divClose = new LiteralField('divClose', '</div>');

        // Create fields
        $name = new TextField('Name');
        $email = new EmailField('Email');
		$checkbox = new CheckboxField ('privacy', 'Ik ga akkoord met de privacy verklaring');
        $message = new TextareaField('Message');
        
        if(isset($_GET['id'])) {
            $productName = new HiddenField('ProductName', '', "{$this->Product->Name}");
            $productLink = new HiddenField('ProductLink', '', "{$this->Product->Link()}");
        } else {
            $productName = new HiddenField('ProductName', '', "");
            $productLink = new HiddenField('ProductLink', '', "");
        }

        $submit = new FormAction('SubmitMoreInfoForm', 'Vraag aan');

        // Changes to fields
        $name->setTitle('Naam');
        $message->setTitle('Wat wilt u weten?');
        $submit->addExtraClass('button btn-dark');

        // $product->value

        $fields = new FieldList(
            $row,
                $col6,
                    $name,
                $divClose,
                $col6,
                    $email,
                $divClose,
            $divClose,
            $row,
                $col12,
                    $message,
					$checkbox,
                $divClose,
            $divClose,
            $productName,
            $productLink
        );

        $actions = new FieldList(
            $submit
        );

        // $required = new RequiredFields('Name', 'Email', 'Message');
        $required = new RequiredFields($name, $email, $checkbox);

        $form = new Form($this, 'MoreInfoForm', $fields, $actions, $required);

        $form->addExtraClass('form');

        return $form;
    }

    public function SubmitMoreInfoForm($data, $form) {   
        $config = SiteConfig::current_site_config(); 
        
        $email = new Email(); 

        $email->setHTMLTemplate('Emails/MoreInfoEmail');
        $email->setData([
            'Name' => $data['Name'],
            'Email'=> $data['Email'],
            'Product' => $data['ProductName'],
            'ProductLink' => $data['ProductLink'],
            'Message' => $data['Message']
        ]);
         
        $email->setTo($config->DefaultEmail); 
        $email->setFrom('noreply@paulineswoonwinkel.nl');
        $email->setReplyTo($data['Email']);
        $email->setSubject("{$data["Name"]} wil meer informatie over {$data['ProductName']}"); 

        $email->send(); 

         return $this->redirect('/bedankt');
    }

    // ------------------ ORDER ------------------

    public function OrderForm() {

        //Bootstrap
        $row = new LiteralField('row', '<div class="row">');
        $col6 = new LiteralField('col-6', '<div class="col-12 col-md-6">');
        $col12 = new LiteralField('col-12', '<div class="col-12">');
        $divClose = new LiteralField('divClose', '</div>');

        // Create fields
        $name = new TextField('Name');
        $phone = new TextField('Phone');
        $street = new TextField('Street');
        $postal = new TextField('Postal');
        $city = new TextField('City');
        $email = new EmailField('Email');
        $message = new TextareaField('Message');
			$checkbox = new CheckboxField ('privacy', 'Ik ga akkoord met de privacy verklaring');
        
        if(isset($_GET['id'])) {
            $productName = new HiddenField('ProductName', '', "{$this->Product->Name}");
            $productLink = new HiddenField('ProductLink', '', "{$this->Product->Link()}");
            $productID = new HiddenField('ProductID', '', "{$this->Product->ID}");
        } else {
            $productName = new HiddenField('ProductName', '', "");
            $productLink = new HiddenField('ProductLink', '', "");
            $productID = new HiddenField('ProductID', '', "");
        }

        $submit = new FormAction('SubmitOrderForm', 'Plaats bestelling');

        // Changes to fields
        $name->setTitle('Naam');
        $phone->setTitle('Telefoonnummer');
        $street->setTitle('Straat + huisnummer');
        $postal->setTitle('Postcode');
        $city->setTitle('Plaats');
        $message->setTitle('Opmerkingen');
        $submit->addExtraClass('button btn-dark');

        // $product->value

        $fields = new FieldList(
            $row,
                $col12,
                    $name,
                $divClose,
            $divClose,
            $row,
                $col6,
                    $phone,
                $divClose,
                $col6,
                    $email,
                $divClose,
            $divClose,
            $row,
                $col12,
                    $street,
                $divClose,
            $divClose,
            $row,
                $col6,
                    $postal,
                $divClose,
                $col6,
                    $city,
                $divClose,
            $divClose,
            $row,
                $col12,
                    $message,
					$checkbox,
                $divClose,
            $divClose,
            $productName,
            $productLink,
            $productID
        );

        $actions = new FieldList(
            $submit
        );

        // $required = new RequiredFields('Name', 'Email', 'Message');
        $required = new RequiredFields($name, $email, $checkbox);

        $form = new Form($this, 'OrderForm', $fields, $actions, $required);

        $form->addExtraClass('form');

        return $form;
    }

    public function SubmitOrderForm($data, $form) {   
        $config = SiteConfig::current_site_config(); 

        $order = new Order();
        $order->populate($data);
        $order->write();

        $email = new Email(); 

        $email->setHTMLTemplate('Emails/OrderEmail');
        $email->setData([
            'ID' => $order->ID,
            'Name' => $data['Name'],
            'Email'=> $data['Email'],
            'Phone' =>  $data['Phone'],
            'Street' => $data['Street'],
            'Postal' => $data['Postal'],
            'City' => $data['City'],
            'ProductName' => $data['ProductName'],
            'ProductLink' => $data['ProductLink'],
            'Message' => $data['Message']
        ]);
         
        $email->setTo($config->DefaultEmail); 
        $email->setFrom('noreply@paulineswoonwinkel.nl');
        $email->setSubject("Nieuwe bestelling (#$order->ID)"); 

        $email->send();

        $email = new Email();

        $email->setHTMLTemplate('Emails/CustomerOrderEmail');
        $email->setData([
            'ID' => $order->ID,
            'Name' => $data['Name'],
            'Email'=> $data['Email'],
            'Phone' =>  $data['Phone'],
            'Street' => $data['Street'],
            'Postal' => $data['Postal'],
            'City' => $data['City'],
            'ProductName' => $data['ProductName'],
            'ProductLink' => $data['ProductLink'],
            'Message' => $data['Message']
        ]);
         
        $email->setTo('info@paulineswoonwinkel.nl'); 
        $email->setFrom('noreply@paulineswoonwinkel.nl');
        $email->setSubject("Bevestiging van bestelling (#$order->ID)"); 

        $email->send();
		
		return $this->redirect('/bedankt');
    }
}