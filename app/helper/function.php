<?php
function showError($errors,$name){
    if ($errors->has($name)) {
        echo '<div style="margin-top:10px;padding:5px;" class="alert alert-danger" role="alert">
        '.$errors->first($name).'
        </div>';
    }
}

function GetCategory($mang,$parent,$shift,$id_select)
{
	foreach($mang as $value)
	{
	  if($value['parent']==$parent)
	  {
		  if($value['id']==$id_select)
		  {
		   echo "<option value=".$value['id']." selected>".$shift.$value['name']."</option>";
		  }
		  else
		  {
		   echo "<option value=".$value['id']." >".$shift.$value['name']."</option>";
		  }
		 GetCategory($mang,$value['id'],$shift."---|",$id_select);
	  }
	}
}

function ShowCategory($mang,$parent,$shift)
{
	foreach($mang as $value)
	{
	  if($value['parent']==$parent)
	  {
		   echo '<div class="item-menu"><span>'.$shift.$value['name'].'</span>
           <div class="category-fix">
               <a class="btn-category btn-primary" href="'.route('category.edit',['id'=>$value->id]).'"><i class="fa fa-edit"></i></a>
               <a class="btn-category btn-danger" href="#"><i class="fas fa-times"></i></i></a>
           </div>
       </div>';
       ShowCategory($mang,$value['id'],$shift."---|");
	  }
	}
}

function Parent($mangs,$mang,$shift){
	foreach ($mang as $key => $value) {
		if ($value['parent']==$mang->id) {
            $value['parent']=$mang->parent;
            $value->save();
			Parent($mangs,$value->id,'--|');
		}
	}
}
