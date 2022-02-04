<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_model extends CI_Model
{

    /*-------------------Start section for home---------------------*/

   //ang funtion na ito ay kukunin nya ang mga new product sa ating database
   public function new_product()
   {
       $this->db->select("*");
       $this->db->from("product");
       $this->db->order_by("Product_id","desc");
       $this->db->limit(8);
       return $this->db->get();
   }

   /*-------------------End section for home---------------------*/


   /*------------------Start section for normal login------------*/
   
   //Ang funtion na ito ay kukunin nya ang isang email at password ng isang customer
   public function login_customer($data)
   {
     $this->db->select('*');
     $this->db->where('Email',$data['Email']);
     $this->db->where('Password',$data['Password']);
     $this->db->from('customer_detail');
     $this->db->limit(1);
     $query = $this->db->get(); 
     if($query->num_rows()==1){
     return $query->row();
     }else{
     return false;
     }
    }

    //Ang funtion na ito ay kukunin nya ang isang email at password ng isang admin
    public function login_admin($data)
    {
     $this->db->select('*');
     $this->db->where('Email',$data['Email']);
     $this->db->where('Password',$data['Password']);
     $this->db->from('admin');
     $this->db->limit(1);
     $query = $this->db->get(); 
     if($query->num_rows()==1){
     return $query->row();
     }else{
     return false;
     }
    }

    /*------------------End section for normal login------------*/
   

   /*-----------------Start section for google login----------------*/
   //Ang function na ito ay kukunin nya ang email na naka register na sa database
   public function is_already_register($email)
   {
       $this->db->select('*');
       $this->db->where('Email', $email);
       $query = $this->db->get('customer_detail');
       if($query->num_rows() > 0)
       {
          return true;
       }else{
       return false;
       }
    }
    
    //Ang function na ito ay kukunin nya ang isang email na may roon ng password
    public function check_password($email)
    {
       $this->db->select('*');
       $this->db->where('Email',$email);
       $this->db->from('customer_detail');
       $this->db->limit(1);
       $query = $this->db->get(); 
       if($query->num_rows()==1){
       return $query->row();
       }else{
       return false;
       }
     }

    //ang function na ito ay e-aupdate nya lang ulit ang data nasa database
    function update_user_data($data, $id)
    {
       $this->db->where('Customer_id', $id);
       $this->db->update('customer_detail', $data);
    }

    //Ang function na ito ay e-iinsert nya ang data na ng galing sa google account mo 
    function insert_user_data($data)
    {
       $this->db->insert('customer_detail', $data);
    }
    /*-----------------End section for google login-------------------------*/
    
    
    /*-----------------Start section for signup----------------------------*/
    //Ang funtion na ito ay mag e-insert ng mga  customer sa database
    public function signup($data)
    { 
       $sql = "INSERT INTO customer_detail (Customer_id,User_Name, Full_Name , Gender , Age , Contact_No , Email , Password,Created_at,Code) VALUES ?";
       $data = array($data);
       return $this->db->query($sql,$data);
    }
    //Ang funtion na ito kukunin nya ang isang email kung naka register naba
    public function cheack_email($entered_email)
    {
       $sql = "SELECT Email,Password FROM customer_detail WHERE Email = ? ";
       $data = array($entered_email);
       return  $this->db->query($sql,$data);
    }
    //Ang funtion na ito ay para ma kuha nya ang isang contact number
    public function cheack_number($entered_number)
    {
       $sql = "SELECT Contact_No FROM customer_detail WHERE Contact_No = ?";
       $data = array($entered_number);
       return  $this->db->query($sql,$data);
    }
    
    public function select_email($data)
    {    
       $this->db->select('Code,Verify');
       $this->db->from('customer_detail');
       $this->db->where('Code', $data);
       $this->db->limit(1);
       $query = $this->db->get(); 
       if($query->num_rows()==1)
       {
          return $query->row();
       }else{
        return false;
        }
    }
    //Ang funtion na ito ay mag a-update ang vefiry 3 
    public function verify_email($data)
    {
       $sql  = "UPDATE customer_detail SET Verify=3 WHERE Code = ? LIMIT 1";
       $data = array($data);
       return  $this->db->query($sql,$data);
    }

    /*-----------------End section for signup----------------------------*/

    /*-----------------Start section for forgot password----------------------------*/
    public function fgw_check_email($email)
    {
        $sql = "SELECT Email FROM customer_detail WHERE Email = ?";
        $data = array($email);
        return  $this->db->query($sql,$data);
    }

   public function fgw_check_verify($recovery_token)
   {
      $this->db->select('Code,Verify');
      $this->db->from('customer_detail');
      $this->db->where('Code', $recovery_token);
      $this->db->limit(1);
      $query = $this->db->get(); 
      if($query->num_rows()==1){
      return $query->row();
      }else{
      return false;
      }
   }

   public function fgw_update_token($recovery_token,$email)
   {
      $sql  = "UPDATE customer_detail SET Code= ? WHERE Email = ? LIMIT 1";
      $data = array($recovery_token,$email);
      return  $this->db->query($sql,$data);
   }

   public function fgw_update_verify_status($verify_status,$recovery_token)
   {
      $sql  = "UPDATE customer_detail SET Verify= ? WHERE Code = ? LIMIT 1";
      $data = array($verify_status,$recovery_token);
      return  $this->db->query($sql,$data);
   }

   public function fgw_update_password($password,$recovery_token)
   {
      $sql  = "UPDATE customer_detail SET Password= ? WHERE Code = ? LIMIT 1";
      $data = array($password,$recovery_token);
      return  $this->db->query($sql,$data);
   }
   /*-----------------End section for forgot password----------------------------*/
    
   /*-------------------Start section for addmin_product crud------------------------*/
   
   //Ang funtion na ito ay kukunin nya ang mga product na aayus sa ating query
   public function display_product()
   {
      $this->db->select('product.Picture,product.Product_id,product.Product_Name,product.Stock,product.Price,product.Date_Manufacture,product.Date_Exp,DATEDIFF(Date_exp,CURDATE()) AS r_days,product_category.Category_Name,product_supplier.Name');
      $this->db->from('product');
      $this->db->join('product_category','product.Category_id = product_category.Category_id');
      $this->db->join('product_supplier','product_supplier.supplier_id = product.Supplier_id');
      $this->db->where('product.Category_id = product_category.Category_id And product_supplier.supplier_id = product.Supplier_id');
      $this->db->order_by('Product_id','desc');
      return  $this->db->get();
   }

   //Ang funtion na ito ay kukunin nya lahat ang mga product category
   public function display_category()
   {
      $query = $this->db->get("product_category");
      return $query->result();
   }

   //Ang funtion na ito ay kukunin nya ang mga product supplier
   public function display_supplier()
   {
      $query = $this->db->get("product_supplier");
      return $query->result();
   }
   
   //Ang funtion na ito ay para save ang mga bagong product
   public function insert_product($data)
   {
      $sql = "INSERT INTO product (Product_Name,Stock,Price,Date_Manufacture,Date_Exp,Product_Detail,Category_id,Supplier_id,Picture) VALUES ?";
      $data = array($data);
      return $this->db->query($sql,$data);
   }
   //Ang function na ito ay mag e-insert sya ng product category 
   public function insert_category($data)
   {
      $sql = "INSERT INTO product_category (Category_Name) VALUES ?";
      $data = array($data);
      return $this->db->query($sql,$data);
   }

   //Ang funtion na ito ay mag e-insert sya ng supplier  
   public function insert_supplier($data)
   {
      $sql = "INSERT INTO product_supplier (Name) VALUES ?";
      $data = array($data);
      return $this->db->query($sql,$data);
   }

   //Ang funtion na ito ay mag a-update ng product
   public function update($data)
   {
      $pn=$data['pn'];
      $psk = $data['psk'];
      $pr= $data['pr'];
      $dm = $data['dm'];
      $de = $data['de'];
      $id = $data['id'];
      $pc = $data['pc'];
      $ps = $data['ps'];
      $query = "UPDATE product AS p
      INNER JOIN  product_category AS pc, product_supplier As sc
      SET p.Product_Name = ? ,p.Stock = ? , p.Price = ? ,p.Date_Manufacture= ? ,p.Date_Exp = ?, p.Category_id = pc.Category_id, p.Supplier_id = sc.Supplier_id  
      WHERE p.Product_id = ? AND pc.Category_Name = ? And sc.Name = ? ";
      $data = array($pn,$psk,$pr,$dm,$de,$id,$pc,$ps);
      return $this->db->query($query,$data);
   }

   //Ang function na ito ay e-update nya ang selected category 
   public function update_category($cn,$id)
   {
      $query = "UPDATE product_category SET Category_Name = ?  WHERE Category_id = ?";
      $data= array($id,$cn);
      return $this->db->query($query,$data);
   }
   //Ang function na ito ay e-update nya ang selected  supplier
   public function update_supplier($sn,$id)
   {
      $query = "UPDATE product_supplier SET Name = ?  WHERE Supplier_id = ?";
      $data= array($id,$sn);
      return $this->db->query($query,$data);
   }

   //Ang funtion na ito ay kukunin nya ang isang selected product para e-delete
   public function delete_product($id)
   {
     $this->db->where("Product_id", $id);
     $this->db->delete("product");
     return true;
   }
   //Ang funtion na ito ay e-ddelete nya ang category 
   public function delete_category($id)
   {
     $this->db->where("Category_id", $id);
     $this->db->delete("product_category");
     return true;
   }

   //Ang funtion na ito ay e-ddelete nya ang supplier
   public function delete_supplier($id)
   {
     $this->db->where("Supplier_id", $id);
     $this->db->delete("product_supplier");
     return true;
   }

   public function fetch_product($query)
   {
      $this->db->select('product.Picture,product.Product_id,product.Product_Name,product.Product_Detail,product.Stock,product.Price,product.Date_Manufacture,product.Date_Exp,DATEDIFF(Date_exp,CURDATE()) AS r_days,product_category.Category_Name,product_supplier.Name');
      $this->db->from('product');
      $this->db->join('product_category','product.Category_id = product_category.Category_id');
      $this->db->join('product_supplier','product_supplier.supplier_id = product.Supplier_id');
      $this->db->where('product.Category_id = product_category.Category_id And product_supplier.supplier_id = product.Supplier_id');
      $this->db->order_by('Product_Name','asc');
      if($query != '')
      {
         $this->db->like('Product_Name',$query);
      }
      $this->db->limit(8);
      return $this->db->get();
   }

   public function count_all()
   {
      $query = $this->db->get("Product");
      return $query->num_rows();
   }

   public function fetch_details($limit, $start)
   {
      $output = '';
      $this->db->select('product.Picture,product.Product_id,product.Product_Name,product.Product_Detail,product.Stock,product.Price,product.Date_Manufacture,product.Date_Exp,DATEDIFF(Date_exp,CURDATE()) AS r_days,product_category.Category_Name,product_supplier.Name');
      $this->db->from('product');
      $this->db->join('product_category','product.Category_id = product_category.Category_id');
      $this->db->join('product_supplier','product_supplier.supplier_id = product.Supplier_id');
      $this->db->where('product.Category_id = product_category.Category_id And product_supplier.supplier_id = product.Supplier_id');
      $this->db->order_by('Product_Name','asc');
      $this->db->limit($limit, $start);
      $query = $this->db->get();
      foreach($query->result() as $row)
      {
        $output .= '
        <div class="product-layout  product-grid  col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                <div class="item">
                  <div class="product-thumb  mb_30">
                    <div class="image product-imageblock"> <a href="product_detail?detail='.$row->Product_id.'"> <img data-name="product_image" src="'.base_url().'assets/images/product/'.$row->Picture.'" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="'.base_url().'assets/images/product/'.$row->Picture.'" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a> </div>
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
                      <p class="product-desc mt_20 mb_60"></p>
                      <div class="button-group text-center">
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
      return $output;
   }

   public function product_detail($id)
   {
      $this->db->select('*');
      $this->db->from('product');
      $this->db->where('Product_id',$id);
      return $this->db->get();
   }

   public function top_product()
   {
      $this->db->select("*");
      $this->db->from("product");
      $this->db->order_by("stock","desc");
      $this->db->limit(4);
      return $this->db->get();
   }

   public function get_customer($data)
   {
      $this->db->select('*');
      $this->db->where('Email',$data);
      $this->db->from('customer_detail');
      $this->db->limit(1);
      $query = $this->db->get(); 
      if($query->num_rows()==1){
      return $query->row();
      }else{
      return false;
      }
   }

   public function get_allcustomer()
   {
     
   }

   

  







    
   


}