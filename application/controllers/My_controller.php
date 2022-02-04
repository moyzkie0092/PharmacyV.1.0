<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();   
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    //ang function na ito ay mag display ng new product sa home page
    public function home($page='home')
    {
        if(!file_exists(APPPATH.'views/CustomerPages/'.$page.'.php'))
        {
          show_404();
        }
        $data['data'] = $this->My_model->new_product();
        $this->load->view('Templates/header');
        $this->load->view('Customerpages/home',$data);
        $this->load->view('Templates/footer');
    }

     /*----------------------Start section for Login-----------------------------------*/
    //Ang function na ito ay mag display ng ating login page at kasama narin
    //dito ang ating login with google api
    public function login_page()
    {
        include_once APPPATH . "libraries/vendor/autoload.php";
        $google_client = new Google_Client();
        $google_client->setClientId('843424078053-2a877cb7jtk9pguoq6a9acnakg975pdv.apps.googleusercontent.com'); 
        $google_client->setClientSecret('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');
        $google_client->setRedirectUri('http://localhost/PharmacyV.1.0');
        $google_client->addScope('email');
        $google_client->addScope('profile');
        if(isset($_GET["code"]))
        {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
            if(!isset($token["error"]))
            {
                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $info = $google_service->userinfo->get();
                $current_datetime = date('Y-m-d H:i:s');
                $check_email = $this->My_model->is_already_register($info['email']);
                $check_password = $this->My_model->check_password(($info['email']));
                $result =$check_password;
                if($check_email)
                {
                    if($result->Password==null)
                    {
                        //update data
                        $user_data = array(
                        'Full_Name' => $info['given_name'].' '.$info['family_name'],
                        'Email' => $info['email']);
                         $this->My_model->update_user_data($user_data, $info['id']);
                         $result = $this->My_model->get_customer($info['email']);
                         $user_data = array(
                         'Full_Name' => $result->Full_Name,
                         'User_Name' => $result->User_Name,
                         'Email' => $result->Email,
                         'Contact_No' => $result->Contact_No,
                         'Gender' => $result->Gender,
                         'Age' => $result->Age,
                         );
                         $this->session->set_userdata('google_authenticated','1');
                         $this->session->set_userdata('user_data', $user_data);
                    }else{
                    $this->session->unset_userdata('access_token');
                    $this->session->unset_userdata('google_authenticated');
                    $this->session->unset_userdata('user_data');
                    redirect($this->login_page());
                    } 
                }else{
                //insert data
                $data = array(
                'Customer_id' => $info['id'],
                'Full_Name' => $info['given_name'].' '.$info['family_name'],
                'Email'  => $info['email'],
                'Gender'  => $info['gender'],
                'Verify'  => 1,
                'Created_at'  => $current_datetime);
                 $this->My_model->insert_user_data($data);

                 $result = $this->My_model->get_customer($data['Email']);
                 $user_data = array(
                 'Full_Name' => $result->Full_Name,
                 'User_Name' => $result->User_Name,
                 'Email' => $result->Email,
                 'Contact_No' => $result->Contact_No,
                 'Gender' => $result->Gender,
                 'Age' => $result->Age,
                 );
                 $this->session->set_userdata('google_authenticated','1');
                 $this->session->set_userdata('user_data', $user_data);
                }
            }
        }
        if(!$this->session->userdata('access_token'))
        {
            $data['data'] = $google_client->createAuthUrl();
            $this->load->view("templates/header");
            $this->load->view("CustomerPages/login",$data);
            $this->load->view("templates/footer");
        }else{
       $this->home();
       }
    }

    //Ang function ito ay para sa login ng mga user
    public function login()
    {
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required|md5');
        if($this->form_validation->run()==FALSE)
        {
           $this->login_page();
        }else{
        $data=[
        'Email' =>$this->input->post('email'),
        'Password' =>$this->input->post('password')];
        $user_login = new My_model;
        $result = $user_login->login_customer($data);
        $admin_result = $user_login->login_admin($data);
        if($result !==FALSE)
        {
            if($result->Verify == 0)
            {
                $this->session->set_flashdata('statuss','Please verify your account first!');
                $this->login_page();
   
            }else{
            $auth_customerdetails=[
            'Full_Name' => $result->Full_Name,
            'User_Name' => $result->User_Name,
            'Email' => $result->Email,
            'Contact_No' => $result->Contact_No,
            'Gender' => $result->Gender,
            'Age' => $result->Age,];
            $this->session->set_userdata('authenticated','1');
            $this->session->set_userdata('auth_customer',$auth_customerdetails);
            $this->home();
            }
        }else{
        if($admin_result !== FALSE)
        {
            $auth_admin=[
            'Full_Name' => $admin_result->Full_Name];
            $this->session->set_userdata('admin_authenticated','1');
            $this->session->set_userdata('auth_admin',$auth_admin);
            redirect(base_url('My_controller/display_product'));
        }else{
        $this->session->set_flashdata('statuss','Invalid email or password!');
        $this->login_page();
   
        }
        }

       }
    }
    /*----------------------End section for Login-----------------------------------*/
     
    /*----------------------Start section for Singup-----------------------------------*/

    //ang funtion na ito ay para ma view ang signup page
    public function signup_page()
    {
       $this->load->view('Templates/header');
       $this->load->view('Customerpages/signup');
       $this->load->view('Templates/footer');
    }

    public function signup_customer()
    {
       //nag set ako ng mga validation 
       $this->form_validation->set_rules('username','Username','trim|required');
       $this->form_validation->set_rules('fullname','Fullname','trim|required');
       $this->form_validation->set_rules('gender','Gender','required');
       $this->form_validation->set_rules('age','Age','trim|required');
       $this->form_validation->set_rules('mobile_number','Mobile number','trim|required');
       $this->form_validation->set_rules('email','Email','trim|required|valid_email');
       $this->form_validation->set_rules('password','Password','trim|required|md5');
       $this->form_validation->set_rules('confirm-password','confirm-Password','trim|required|matches[password]|md5');
 
       //kinuha ko ang  value  ng txtbox eamil
       $entered_email=$this->input->post('email');
       $entered_number = $this->input->post('mobile_number');
       //nilagay ko sa cheack_email() ang value 
       $emailcount = $this->My_model->cheack_email($entered_email);
       $number_count =$this->My_model->cheack_number($entered_number);
       $cid=rand(1000000000000000000,9000000000000000000);
       if($this->form_validation->run()==FALSE)
       {
        $this->signup_page();   
       }else{
       if($emailcount->num_rows()<=0 && $number_count->num_rows()<=0)
       {
          $verify_token = md5(rand());
          $current_datetime = date('Y-m-d H:i:s');
          $data = array(
          'Customer_id' => $cid, 
          'User_Name' => $this->input->post('username'),
          'Full_Name' => $this->input->post('fullname'),
          'Gender' => $this->input->post('gender'),
          'Age' => $this->input->post('age'),
          'Contact_No' => $this->input->post('mobile_number'),
          'Email' => $this->input->post('email'),
          'Password' => $this->input->post('password'),
          'Created_at' => $current_datetime,
          'verification_key' => $verify_token);
        $name =  $this->input->post('fullname');
        /* Load PHPMailer library */
        $this->load->library('phpmailer_lib');
        /* PHPMailer object */
        $mail = $this->phpmailer_lib->load();
        /* SMTP configuration */
        $mail->isSMTP();
        $mail->Host     = 'mail.smtp2go.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'spcc.edu.ph';
        $mail->Password = 'Spcc1978';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 2525;
        $mail->setFrom('pharmacyshop2021@gmail.com');
        $mail->addAddress($this->input->post('email'));
        /* Email subject */
        $mail->Subject = 'Email Verification from Pharmacy OnlineShop';
    
        /* Set email format to HTML */
        $mail->isHTML(true);
        $url = base_url();
        /* Email body content */
        $mailContent = "<p>Hi $name </p>
        <p>You have received your verification email to verify your account</p>
        <p >Link: <a href='$url/My_controller/email_verify?token=$verify_token'>$url/EmailVerify?token=$verify_token</p>
        <p>Thanks </p> ";
        $mail->Body = $mailContent;
        /* Send email */
        if(!$mail->send()){
         echo 'Mail could not be sent.';
         echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
        $this->session->set_flashdata('status','Check in your email for email verification mail!');
        $this->My_model->signup($data);
        redirect('My_controller/signup_page');
        }
       }elseif($emailcount->num_rows()>0)
       {
        $this->session->set_flashdata('status','Your email address is alreaady register!');
        redirect('My_controller/signup_page');
       }

      }
  
    }
    /*----------------------Endt section for Singup-----------------------------------*/


    /*----------------------Start section for forgotpassword-----------------------------------*/

    //Ang function na ito ay para ma view ang forgotpassword page
    public function forgotpass_page()
    {
        $this->load->view('Templates/header');
        $this->load->view('Customerpages/forgotpassword');
        $this->load->view('Templates/footer');
    }

    public function newpassword_page()
    {
        $this->load->view('Templates/header');
        $this->load->view('Customerpages/changepassword');
        $this->load->view('Templates/footer');
    }

    //Ang funtion na ito ay para makapag send ng recovery token sa iyong email
    //Para ma recover ang iyong account
    public function sendrecovery_token()
    {
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email');

        if($this->form_validation->run()==FALSE)
        {
            $this->forgotpass_page();
        }else{
        $recovery_token = md5(rand());
        $email = $this->input->post('email');  
        $found_email = $this->My_model->fgw_check_email($email); 
          if($found_email->num_rows() > 0)
          {
              $result =$this->My_model->fgw_update_token($recovery_token,$email);
              if($result == TRUE)
              {   
                /* Load PHPMailer library */
                $this->load->library('phpmailer_lib');
                /* PHPMailer object */
                $mail = $this->phpmailer_lib->load();
                /* SMTP configuration */
                $mail->isSMTP();
                $mail->Host     = 'mail.smtp2go.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'spcc.edu.ph';
                $mail->Password = 'Spcc1978';
                $mail->SMTPSecure = 'tls';
                $mail->Port     = 2525;
                $mail->setFrom('pharmacyshop2021@gmail.com');
                /* Add a recipient */
                $mail->addAddress($this->input->post('email'));
                /* Email subject */
                $mail->Subject = 'Your recovery token ';
                /* Set email format to HTML */
                $mail->isHTML(true);    
                $url = base_url();
                /* Email body content */
                $mailContent = "<p>Hi $email </p>
                <p>You have received your recovery token you are now able to recover your account</p>
                <p >Link: <a href='$url/My_controller/get_recovery_token?recovery_token=$recovery_token'>$url/My_controller/get_recovery_token?recovery_token=$recovery_token</p>
                <p>Thanks </p> ";
                $mail->Body = $mailContent;
                /* Send email */
                if(!$mail->send())
                {
                  echo 'Mail could not be sent.';
                  echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else{
                $verify_status =2;
                $this->My_model->fgw_update_verify_status($verify_status,$recovery_token);
                $this->session->set_flashdata('r_status','Recovey token has been send on your email!');
                 redirect(base_url('My_controller/forgotpass_page'));
                }
              }
            }else{
             $this->session->set_flashdata('r_status','This email are not exist!');
             redirect(base_url('My_controller/forgotpass_page'));
            }      
        }
    }

    //Ang function na ito ay para makapag palit kana ng password
    public function get_recovery_token()
    {   
        if(isset($_GET['recovery_token']))
        {    
             $recovery_token = $_GET['recovery_token'];
             $data ['recovery_token'] = $recovery_token;
             $check_verify = $this->My_model->fgw_check_verify($recovery_token);
             if($check_verify)
             {
                if($check_verify->Verify==3)
                {
                   $this->session->set_flashdata('r_status','Your recovery token is already use!'); 
                   redirect(base_url('My_controller/forgotpass_page'));
                }
                elseif($check_verify->Verify==1)
                {
                    $this->My_model->fgw_update_verify_status($recovery_token);
                }
             }else{
             show_404();
             }
             $this->form_validation->set_rules('password','Password','trim|required|md5');
             $this->form_validation->set_rules('con-password','confirm-Password','trim|required|matches[password]|md5');
             if ($this->form_validation->run()==FALSE)
             {
               
                $this->load->view('templates/header');
                $this->load->view('CustomerPages/changepassword',$data);
                $this->load->view('templates/footer');

             }else{ 
                $newpassword = $this->input->post('password');
                $result= $this->My_model->fgw_update_password($newpassword,$recovery_token);
                if($result)
                {
                  $verify_status = 3;
                  $check_verify = $this->My_model->fgw_update_verify_status($verify_status,$recovery_token);
                  $this->session->set_flashdata('statuss','Your password is successfuly change!'); 
                  redirect(base_url('My_controller/login_page'));
                }else{
                echo "error";
                }

             } 
            
        }
        
    }

    //Ang funtion na ito ay para ma verify ang email
    public function email_verify()
    {
     
      if(isset($_GET['token']))
      {
         $data =  $_GET['token'];
         $get_email =  $this->My_model->select_email($data);
         if($get_email==true)
         {
           if($get_email->Verify==0)
           {
             $cliked_token = $get_email->Code;
             $data = ['cliked_token' =>  $cliked_token];
             $verify_email = $this->My_model->verify_email($data);
            
             if($verify_email)
             {
                $this->session->set_flashdata('statuss','Your account has been verified Successfully');
                $this->login_page();
             }else{
                
                $this->session->set_flashdata('statuss','Verification Failed!');
                $this->login_page();
             }

           }else{
             $this->session->set_flashdata('statuss','Email Already Verified. Plase Login!');
             $this->login_page();
           }
         }
         
        }else{
        $this->session->set_flashdata('statuss','Not Allowed!');
        $this->login_page();
        }
      
    }
    /*----------------------End section for forgotpassword-----------------------------------*/
     
    public function view_product()
    {
        $data ['data'] = $this->My_model->top_product();
        $this->load->view('Templates/header');
        $this->load->view('Customerpages/product',$data);
        $this->load->view('Templates/footer');
    }

    public function fetch_product()
    {
        $output = '';
        $query = '';

        if($this->input->post('query'))
        {
            $query = $this->input->post('query'); 
           
        }
      
        $data = $this->My_model->fetch_product($query);

        if($data->num_rows() > 0)
        {
          
            foreach($data->result() as $row)
            {
                $output .= '
                <div class="product-layout  product-grid  col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                <div class="item">
                  <div class="product-thumb  mb_30">
                    <div class="image product-imageblock"> <a href="'.base_url().'My_controller/product_detail?detail='.$row->Product_id.'"> <img data-name="product_image" src="'.base_url().'assets/images/product/'.$row->Picture.'" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="'.base_url().'assets/images/product/'.$row->Picture.'" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a> </div>
                    <div class="caption product-detail text-left">
                      <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem" class="text">'.$row->Product_Name.'</a></h6>
                      <div class="rating">
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                      </div>
                      <span class="price"><span class="amount"><span class="currencySymbol">₱</span>'.$row->Price.'.00</span>
                      </span>
                      <p class="product-desc mt_20 mb_60"> </p>
                      <div class="button-group text-center" id="add">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart add_cart" name="add_cart" data-productname="'.$row->Product_Name.'" data-price="'.$row->Price.'" data-productid="'.$row->Product_id.'" data-picture="'.$row->Picture.'"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              ';
            }
        }else{
            $output .= '<tr style="text">
            <td colspan="5">No Data Found</td>
            </tr>';
        }
        
        echo $output;
    }


    public function pagination()
    {
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->My_model->count_all();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination ">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];
   
        $output = array(
        'pagination_link'  => $this->pagination->create_links(),
        'result'  => $this->My_model->fetch_details($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function product_detail()
    {
        $id=$this->input->get('detail');
        $data['data'] = $this->My_model->product_detail($id);
        $this->load->view('templates/header');
        $this->load->view('CustomerPages/productdetail',$data);
        $this->load->view('templates/footer');
    }

    
    /*----------------------Start section for cart-------------------------------------------*/

    //Ang funtion na ito ay nakakapag add ng product sa cart
    public function add()
    {
        $this->load->library("cart");
        $data = array(
        "id"  => $_POST["product_id"],
        "picture" => $_POST["picture"],
        "name"  => $_POST["product_name"],
        "qty"  => $_POST["quantity"],
        "price"  => $_POST["product_price"]
        );
        $this->cart->insert($data); 
        echo $this->view();
    }

    //Ang function na ito ay para ma load ang mga product sa cart
    public function load()
    {
        echo $this->view();
    }

    //Ang funtion na ito ay para ma remove ang mga product sa cart
    public function remove()
    {
       $this->load->library("cart");
       $row_id = $_POST["row_id"];
       $data = array(
          'rowid'  => $row_id,
          'qty'  => 0
       );
       $this->cart->update($data);
       echo $this->view();
    }

    //Ang function na ito ay para ma count item sa cart
    public function count_item()
    {
      $this->load->library("cart");
      $output='';
      $output .='
      Item : <span class="cart-qty" data-item="'.count($this->cart->contents()).'">'.count($this->cart->contents()).'</span>
      ';
      echo $output;
    }
    // Ang function na ito para ma view ang laman ng cart
    public function view()
    {   
        $this->load->library("cart");
        $output = '';
       
        $count = 0;
        foreach($this->cart->contents() as $items)
        {
           $count++;
           $output .= '
           <table class="table table-striped">
             <tbody>
               <tr>
                 <td class="text-center"><a href="#"><img src="'.base_url().'assets/images/product/'.$items["picture"].'" alt="iPod Classic" title="iPod Classic"></a></td>
                 <td class="text-left product-name"><a href="#">'.$items["name"].'</a>
                   <span class="text-left price">'.$items["price"].'</span>
                   <input class="cart-qty" name="product_quantity" min="1" value="'.$items["qty"].'" type="number">
                 </td>
                 <td class="text-center "><a class="close-cart "><i class="fa fa-times-circle remove_inventory" id="'.$items["rowid"].'"></i></a></td>
               </tr> ';
        }
        $output .='
        <tr>
          <td class="text-right"><strong>Total</strong></td>
          <td class="text-right">'.$this->cart->total().'</td>
        </tr>
        </tbody>
       </table>
       <input class="btn pull-left mt_10" value="View cart" type="submit">
       <a href="checkout" class="btn pull-right mt_10">Checkout</a>';
       if($count == 0)
        {
           $output = '<h3 align="center">Cart is Empty</h3>';
        }
        return $output;
    }
    /*----------------------End section for cart---------------------------------------------*/


    public function myaccount()
    {
         $this->load->view('Templates/header');
         $this->load->view('Customerpages/account');
         $this->load->view('Templates/footer');
    }

    //Ang function na ito ay para maka pag logout ang mga customer
    public function logout_customer()
    {
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('google_authenticated');
        $this->session->unset_userdata('user_data');
        $this->session->unset_userdata('authenticated');
        $this->session->unset_userdata('auth_customer');
        redirect($this->login_page());
    }

    
    /*---------------------------Start setion for admin side-----------------------------------*/
    
    public function admin_dashboard()
    {
        $this->load->view('templates/admin_header');
        $this->load->view('AdminPages/dashboard');
        $this->load->view('templates/admin_footer');
    }

    //Ang funtion na ito ay para ma display ang mga product sa isang table
    public function display_product()
    {
        if($this->session->has_userdata('admin_authenticated'))
        {
            $result ['data'] = $this->My_model->display_product();
            $result ['category'] = $this->My_model->display_category();
            $result ['supplier'] = $this->My_model->display_supplier();
            $this->load->view('Templates/admin_header');
            $this->load->view('Adminpages/products',$result);
            $this->load->view('Templates/admin_footer');
        }else{
        $this->session->set_flashdata('statuss','Login first!');
        redirect('My_controller/login');
        }
    }
    
    //Ang funtion na ito para maka pag save ng product sa database
    public function addproduct()
    {
         $file_name = $_FILES['p_image']['name'];
         $new_file = time()."".str_replace(' ','-',$file_name);

         $config= ['upload_path'   => './assets/images/product/',
                   'allowed_types' => 'gif|jpg|png',
                   'file_name' => $new_file,
                  ];
         $this->load->library('upload', $config);
         if ( ! $this->upload->do_upload('p_image')) {
            $imageError = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('a_status_danger',$imageError['error']);
            redirect(base_url('My_controller/display_product'));
         }
         else { 
             $uploadedimage = $this->upload->data();
             $this->resizeImage($uploadedimage);
         }  
    }

    //Ang funtion na ito ay para i resize ang image bago i save sa database ang mga data
    public function resizeImage($filename)
    {
      $this->load->library('image_lib');
      $w = $filename['image_width']; //original width
      $h = $filename['image_height']; //original height
      $n_w = 624;
      $n_h = 800;
      $source_ratio = $w / $h;
      $new_ratio = $n_w / $n_h;
      if($source_ratio != $new_ratio)
      {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/product/thumb/'.$filename['file_name'].'';
        $config['maintain_ratio'] = FALSE;

        if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1)))
        {
           $config['width'] = $w;
           $config['height'] = round($w/$new_ratio);
           $config['y_axis'] = round(($h - $config['height'])/2);
           $config['x_axis'] = 0;
        }else{
           $config['width'] = round($h * $new_ratio);
           $config['height'] = $h;
           $size_config['x_axis'] = round(($w - $config['width'])/2);
           $size_config['y_axis'] = 0;  
         }
           $this->image_lib->initialize($config);
           $this->image_lib->crop();
           $this->image_lib->clear();

       }
       $config['image_library'] = 'gd2';
       $config['source_image'] = './assets/images/product/'.$filename['file_name'];
       $config['new_image'] = './assets/images/thumb/'.$filename['file_name'];
       $config['width'] = $n_w;
       $config['height'] =$n_h;
       $this->image_lib->initialize($config);
       $this->load->library('image_lib', $config);
       if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
       }else
       {
         $data = array(
            'Product_Name' => $this->input->post('p_name'),
            'Stock' => $this->input->post('p_stock'),
            'Price' => $this->input->post('p_price'),
            'Date_Manufactor' =>$this->input->post('p_date'),
            'Date_Exp' => $this->input->post('p_date_exp'),
            'Product_Detail' => $this->input->post('p_detail'),
            'Category_id' => $this->input->post('p_category'),
            'Supplier_id' => $this->input->post('p_supplier'),
            'Picture' => $filename['file_name']
        );
            $this->My_model->insert_product($data);
            $this->session->set_flashdata('a_status_success','New  Product "'.$data['Product_Name']. '"  Added Successfully!');
            redirect(base_url('My_controller/display_product'));
      }
      
    }

    //Ang funtion na ito ay para ma delete ang ang mga product 
    public function delete_product()
    {
       $id=$this->input->get('Product_id');
       $response=$this->My_model->delete_product($id);
       if($response==true)
       {   
           $this->session->set_flashdata('a_status_danger',' Product id = '.$id.'  deleted successfully!');
           redirect(base_url('My_controller/display_product'));
       }
        else{
          echo "Error !";
       }
    }

    //Ang funtion na ito ay para ma update ang mga product
    public function update_product()
    {
        
        $data = array(
        'id' => $this->input->post('e_id'),
        'pn' => $this->input->post('e_name'),
        'psk'=>$this->input->post('e_stock'),
        'pr'=> $this->input->post('e_price'),
        'dm' =>$this->input->post('e_date'),
        'de' => $this->input->post('e_date_exp'),
        'pc' => $this->input->post('e_category'),
        'ps' => $this->input->post('e_supplier')
        );
        
        if($this->My_model->update($data))
        {
           $this->session->set_flashdata('a_status_success','Product_id=' .$data['id']. ' Update Successfully!');
           redirect(base_url('My_controller/display_product'));
        }else{
            echo "Something wrong";
        }
    }
    //Ang function na ito ay para mag display ng supplier
    public function display_category()
    {
        if($this->session->has_userdata('admin_authenticated'))
        {
           $result ['data'] = $this->My_model->display_category();
           $this->load->view('templates/admin_header');
           $this->load->view('AdminPages/product_category',$result);
           $this->load->view('templates/admin_footer');
        }else{
        $this->session->set_flashdata('statuss','Login first!');
        redirect('My_controller/login');
        }
    }

    //Ang fution na ito ay para mag add ng supplier
    public function addcategory()
    {
       $addcategory = new My_model;

       $data = array(
           'Category_Name' => $this->input->post('c_name'),
       );
         $addcategory->insert_category($data);
         $this->session->set_flashdata('c_status_success','New  Category "'.$data['Category_Name']. '"  Added Successfully!');
         redirect(base_url('My_controller/display_category'));
    }
    
    //Ang funtion na ito ay para mag update ng category
    public function update_category()
    {
        $update= new My_model;
        $id = $this->input->post('c_id');
        $cn = $this->input->post('c_name');
        if($update->update_category($id,$cn))
        {
           $this->session->set_flashdata('c_status_success','Category_id=' .$id. ' Update Successfully!');
           redirect(base_url('My_controller/display_category'));
        }else{
            echo "Something wrong";
        }
    }
    
    //Ang funtion na ito ay para mag delete ng category
    public function delete_category()
    {
       $id=$this->input->get('Category_id');
       $response=$this->My_model->delete_category($id);
       if($response==true){   
            $this->session->set_flashdata('c_status_danger',' Product id = '.$id.'  deleted successfully!');
            redirect(base_url('My_controller/display_category'));
       }
        else{
          echo "Error !";
       }
    }

    //Ang function na ito ay para mag display ng supplier
    public function display_supplier()
    {
        if($this->session->has_userdata('admin_authenticated'))
        {
          
           $result ['data'] = $this->My_model->display_supplier();
           $this->load->view('templates/admin_header');
           $this->load->view('AdminPages/product_supplier',$result);
           $this->load->view('templates/admin_footer');
        }else{
        $this->session->set_flashdata('statuss','Login first!');
        redirect('My_controller/login');
        }
    }

    //Ang fution na ito ay para mag add ng supplier
    public function addsupplier()
    {
       $addsupplier = new My_model;

       $data = array(
           'Name' => $this->input->post('s_name'),
       );
         $addsupplier->insert_supplier($data);
         $this->session->set_flashdata('s_status_success','New  Supplier "'.$data['Name']. '"  Added Successfully!');
         redirect(base_url('My_controller/display_supplier'));
    }

    //Ang funtion na ito ay para mag update ng supplier
    public function update_supplier()
    {
        $update= new My_model;
        $id = $this->input->post('s_id');
        $sn = $this->input->post('s_name');
        if($update->update_supplier($id,$sn))
        {
           $this->session->set_flashdata('s_status_success','Supplier Name=' .$sn. ' Update Successfully!');
           redirect(base_url('My_controller/display_supplier'));
        }else{
            echo "Something wrong";
        }
    }

    //Ang funtion na ito ay para mag delete ng supplier
    public function delete_supplier()
    {
       $id=$this->input->get('Supplier_id');
       $response=$this->My_model->delete_supplier($id);
       if($response==true){   
            $this->session->set_flashdata('s_status_danger',' Supplier id = '.$id.'  deleted successfully!');
            redirect(base_url('My_controller/display_supplier'));
       }
        else{
          echo "Error !";
       }
    }

    //Ang function na ito ay para mag display ng customer detail

    public function customer_detail()
    {
      
      $this->load->view('Templates/admin_header');
      $this->load->view('Adminpages/customerdetail');
      $this->load->view('Templates/admin_footer');
    }


    public function logout_admin()
    {
         $this->session->unset_userdata('auth_admin');
         $this->session->unset_userdata('admin_authenticated');
         redirect(base_url('My_controller/login'));
    }

}
