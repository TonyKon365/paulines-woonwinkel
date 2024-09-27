<?php

namespace {
    
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\EmailField;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\FormAction;
    use SilverStripe\Forms\Form;
    use SilverStripe\Forms\LiteralField;
    use SilverStripe\Forms\CheckboxField;
    use SilverStripe\Control\Email\Email;
    use SilverStripe\Forms\RequiredFields;
    use Silverstripe\SiteConfig\SiteConfig;

    class ContactPageController extends PageController {

        private static $allowed_actions = [
            'ContactForm'
        ];
        
        
        public function ContactForm() {
            $config = SiteConfig::current_site_config(); 

            // Bootstrap fields
            $row = new LiteralField('row', '<div class="row">');
            $col12 = new LiteralField('col-12', '<div class="col-12">');
            $col4 = new LiteralField('col-4', '<div class="col-12 col-md-4">');
            $divClose = new LiteralField('divClose', '</div>');

            // Form fields
            $name = new TextField('Name');
            $name->setTitle('');
            $name->setAttribute('placeholder', 'Naam');
            
            $phone = new TextField('Phone');
            $phone->setTitle('');
            $phone->setAttribute('placeholder', 'Telefoon');
            
            $email = new EmailField('Email');
            $email->setTitle('');
            $email->setAttribute('placeholder', 'Email');

            $message = new TextareaField('Message');
            $message->setTitle('');
            $message->setAttribute('placeholder', 'Uw bericht');

            $privacy = new CheckboxField('Privacy');
            $privacy->setTitle('');

            $privacyText = new LiteralField('PrivacyText', '<span id="privacyText">Ik ga akkoord met de <a href="'.$config->PrivacyLink->Link.'">privacyverklaring</a></span>');

            $fields  = new FieldList(
                $row,
                    $col4,
                        $name,
                    $divClose,
                    $col4,
                        $phone,
                    $divClose,
                    $col4,
                        $email,
                    $divClose,
                $divClose,
                $row,
                    $col12,
                        $message,
                    $divClose,
                $divClose,
                $privacy,
                $privacyText
            );
            
            $submit = new FormAction('ContactFormSubmit', 'Verzend');
            $submit->addExtraClass('button btn-dark');

            $actions = new FieldList( 
                $submit
            ); 

            $validator = new RequiredFields(
                'Name',
                'Email',
                'Message',
                'Privacy'
            );

            
            $form = new Form($this, 'ContactForm', $fields, $actions, $validator);
            $form->addExtraClass('form');

            return $form;
        }

        public function ContactFormSubmit($data, $form) {   
            $config = SiteConfig::current_site_config(); 

            $email = new Email(); 
    
            $email->setHTMLTemplate('Emails/ContactEmail');
            $email->setData([
                'Name' => $data['Name'],
                'Email'=> $data['Email'],
                'Phone' =>  $data['Phone'],
                'Message' => $data['Message']
            ]);
             
            $email->setTo($config->DefaultEmail); 
            $email->setFrom('noreply@dimademo.nl');
            $email->setSubject("Contact bericht via {$config->Title}"); 
    
            $email->sendPlain();

            $this->redirect('/bedankt');

        }

    }
}