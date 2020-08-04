<?php
function build_menu($rows,$parent=0){  

  $roles = '32,16,33,38,34,1,5,8,11,15,23,24,30,31,36,3,7,9,17,18,19,20,21,22,35,37,4,6,10,12,13,14,25,26,27,28,29,39,40,41,42,43';
  $roles_id = explode(',', $roles);
  $result = '
    
  ';
  foreach ($rows as $row)
  {
    if ($row['parent_menu_id'] == $parent){
        if (has_children($rows,$row['id'])){
            $arrow = "<span class='menu-arrow'></span>";
            
        }else{
            $arrow = "";
        }
        $link = $row['url'];
        if (in_array($row['id'], $roles_id)) {
          $result.= "
          <li>
          <a href='".base_url($link)."'>
              <i class='{$row['icon']}'></i>
              <span> {$row['name']} </span>
              {$arrow}
          </a>";
        }else{
          $result .= "";
        }
      if (has_children($rows,$row['id'])){
        if (in_array($row['id'], $roles_id)) {
          $result .= '<ul class="nav-second-level" aria-expanded="false">';
          $result .= build_menu($rows,$row['id']);
          $result .= '</ul>';
        }else{
          $result .= "";
        }
        
      }
        
      $result.= "</li>";
    }
  }
  $result.= "</li>
  ";

  return $result;
}

function has_children($rows,$id) {
  foreach ($rows as $row) {
    if ($row['parent_menu_id'] == $id)
      return true;
  }
  return false;
} 
// $array = '1,23,4,5,6,512,43,13,7';
// $m = explode(',', $array);
// $menu = array();
//   for ($i=0; $i < count($m) ; $i++) {
//     $datamenu = $this->db->get_where('menu',array('id' => $m[$i]))->result_array();
//     foreach ($datamenu as $datamenu) {
//       $menu[] = $datamenu;
//     }
//   }
$this->db->order_by('id','ASC');
$menu = $this->db->get_where('menu',array('status' => 1))->result_array();  
$data['menu'] = build_menu($menu);
$this->load->view('admin/parts/header');

$this->load->view('admin/parts/menu',$data);
 ?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?php echo ucwords(str_replace('_', ' ', $this->uri->segment(2))) ?></h4>
        </div>
    </div>
</div>
<?php echo $contents ?>
<?php 
$this->load->view('admin/parts/footer');
 ?>