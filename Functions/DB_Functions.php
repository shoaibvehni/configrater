<?php

  class DB_Functions {

       private $db_con;
      // constructor
      function __construct() {
         require_once 'DB_Connect.php';
          $db = new DB_Connect;
          $this->db_con = $db->connect();
      }

      // destructor
      function __destruct() {
          
      }

public function getproducts() {
    
       $result = $this->db_con->query("SELECT * FROM `products`");

          if ($result) {
                         return $result;
            }
}

public function getproductbyId($pid) {
    
       $result = $this->db_con->query("SELECT * FROM `products` WHERE Id='$pid'");

          if ($result) {
                         return $result;
            }
}

public function getproductparts($productid) {
    $result = $this->db_con->query("SELECT * FROM `products_parts` WHERE ProductId = '$productid'");

          if ($result) {

            return $result;
            
            }
}
public function getproductpartsbyid($id) {
    $result = $this->db_con->query("SELECT * FROM `products_parts` WHERE PartId = '$id'");

          if ($result) {

            return $result;
            
            }
}



public function InsertProduct($Productname , $Dpic , $Dprice , $categories){
$result = $this->db_con->query("INSERT INTO `products`( `ProductName`, `Dpic`, `Dprice`,`category`) VALUES ('$Productname','$Dpic','$Dprice','$categories')");

          if ($result) {

            return 1;
            
            }
            else{
                return 0;
            }


}
public function addproductpart($Productid , $partname , $partpic  ){
$result = $this->db_con->query("INSERT INTO `products_parts`( `ProductId`, `PartName` , `partpic` ) VALUES ('$Productid','$partname' , '$partpic')");

          if ($result) {

            return 1;
            
            }
            else
            {
                return 0;
            }


}




public function getvariation($Partid) {
    
       $result = $this->db_con->query("SELECT * FROM `varation` WHERE  PartId = '$Partid'");

         if ($result) {
             
              $row = mysqli_fetch_assoc($result);
            return $row;
            }
}

public function getmetrialvariation($Partid) {
    
       $result = $this->db_con->query("SELECT * FROM `varation` WHERE VariationName = 'Material' AND PartId = '$Partid'");

         if ($result) {
             
            return $result;
            }
}
public function getcolorvariation($Partid) {
        $q = "SELECT * FROM `varation` WHERE VariationName = 'Color' AND PartId = '$Partid'";
        // echo $q; exit;
       $result = $this->db_con->query($q);

         if ($result) {
             
            return $result;
            }
}

public function getvariationbyproduct($Productid) {
    
       $result = $this->db_con->query("SELECT * FROM `varation` WHERE  ProductId = '$Productid'");

         if ($result) {
             
             
            return $result;
            }
}
public function getvariationbypartid($Partid) {
    
       $result = $this->db_con->query("SELECT * FROM `varation` WHERE  PartId = '$Partid'");

         if ($result) {
             
             
            return $result;
            }
}






public function insertvariation($PartId, $Productid, $VariationName, $VariationValue , $VariationPrice , $Variationpic) {
    
       $result = $this->db_con->query("INSERT INTO `varation`( `PartId`, `Productid`,   `VariationName`, `VariationValue`, `VariationPrice` , VariationPic ) VALUES ('$PartId', '$Productid' , '$VariationName', '$VariationValue' , '$VariationPrice' , '$Variationpic' )");

         if ($result) {
             
             return $result;
            }
}






 
 
 public function getorderlist() {
    
       $result = $this->db_con->query("SELECT * FROM `orders`");

          if ($result) {
             
            
            return $result;
            
            }
}
 
         

         public function deletepart($Partid) {
    
       $result = $this->db_con->query("Delete FROM `products_parts` Where PartId='$Partid'");

          if ($result) {
             
            $result2 = $this->db_con->query("Delete FROM `varation` Where PartId='$Partid'");

            if ($result2) {
            
            return $result2;
             }
            }
        }

public function deletevariation($variationid) {
    
       $result = $this->db_con->query("Delete FROM `varation` Where VariationId='$variationid'");

          if ($result) {
             
            
            return $result;
            
            }
}
 
         
    public function deleteProduct($proID) {
    
       $result = $this->db_con->query("Delete FROM `products` Where Id ='$proID'");

          if ($result) {
             
            $result2 = $this->db_con->query("Delete FROM `varation` Where ProductId='$proID'");
            $result3 = $this->db_con->query("Delete FROM `products_parts` Where ProductId='$proID'");

            if ($result2) {
            
            return $result2;
             }
            }
        }

        
        public function getSideView($productid) {
        $result = $this->db_con->query("SELECT vr.* ,pr.PartName FROM `varation` vr left join products_parts pr on pr.PartId = vr.PartId  WHERE vr.ProductId = '$productid' and vr.VariationName ='SideView'");

          if ($result) {

            return $result;
            
            }
        }
         public function getBackView($productid) {
        $result = $this->db_con->query("SELECT vr.* ,pr.PartName FROM `varation` vr left join products_parts pr on pr.PartId = vr.PartId  WHERE vr.ProductId = '$productid' and vr.VariationName ='BackView'");

          if ($result) {

            return $result;
            
            }
        }


}



?>
