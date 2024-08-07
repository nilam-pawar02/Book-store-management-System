<?php

    function uploadBook()
    {
      include '../../components/input/input.php';
     
      echo '
      <form action="uploads/showBooks.php" method="post" enctype="multipart/form-data">

      <h2 class="text-2xl font-bold capitalize text-center">book upload</h2>
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 m-4">
      
      <div class="rounded-xl relative w-full">
      <label for="image" class="capitalize mb-2 block text-gray-700">Book Image</label>
      <input id="image" class="inp-enter px-4 py-3 rounded-xl w-full bg-white shadow" type="file" name="image">
      </div>';
      
          //title, dbname,id 
          
         Input("book Name","book-name","name");
         Input("language","lang","lang");
         Input("price","price","price");
         Input("edition","edition","edition");
         Input("stock","stock","stock");
         Input("genere","genere","genere");
      
     echo '<div class="rounded-xl relative w-full">
          <label for="pub-date" class="capitalize mb-2 block text-gray-700">publication date</label>
          <input name="pub-date" id="pub-date" class="inp-enter px-4 py-3 rounded-xl w-full bg-white shadow" type="date">
      </div>
  </div>
  <div class="grid place-items-center mt-4">
      <button name="upload-book" type="submit" class="capitalize py-3 px-4 bg-black text-white w-[50%] mx-7 rounded-lg">Upload</button>
  </div>
</form>
<script src="../../scripts/hideWarnings.js"></script>

      ';
}
    
?>
  