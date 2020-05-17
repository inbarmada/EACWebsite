var info = '     <div class="menu">  '  +
 '       <div id="loggedinmenu">  '  +
 '         <ul>  '  +
 '             <li style="float: left"><a href="home.html">Home</a></li>  '  +
 '             <li style="float: left"><span style="cursor:pointer;" onclick="pressed()">Subject</span></li>  '  +
 '             <li style="float: right"><a href="profile.html">Profile</a></li>  '  +
 '             <li style="float: right"><a href="logout.php">Log Out</a></li>  '  +
 '         </ul>  '  +
 '       </div>  '  +
 '     '  +
 '       <div id="overlay-menu" class="overlay">  '  +
 '         <div id="overlay-container">  '  +
 '           <table id="subject-list" align="center">  '  +
 '             <tr>  '  +
 '               <th>Grammar</th>  '  +
 '               <th>Vocab</th>  '  +
 '               <th>Writing</th>  '  +
 '             </tr>  '  +
 '             <tr>  '  +
 '               <td>Topic 1</td>  '  +
 '               <td>Vocab 1</td>  '  +
 '               <td>View topics</td>  '  +
 '             </tr>  '  +
 '             <tr>  '  +
 '               <td>Topic 2</td>  '  +
 '               <td>Vocab 2</td>  '  +
 '               <td>View personal essays</td>  '  +
 '             </tr>  '  +
 '             <tr>  '  +
 '               <td>Topic 3</td>  '  +
 '               <td>Vocab 3</td>  '  +
 '               <td>Read public essays</td>  '  +
 '             </tr>  '  +
 '             <tr>  '  +
 '               <td>Topic 4</td>  '  +
 '               <td>Vocab 4</td>  '  +
 '               <td>Write an essay</td>  '  +
 '             </tr>  '  +
 '             <tr>  '  +
 '               <td>Topic 5</td>  '  +
 '               <td>Vocab 5</td>  '  +
 '             </tr>  '  +
 '             <tr>  '  +
 '               <td>Topic 6</td>  '  +
 '               <td>Vocab 6</td>  '  +
 '             </tr>  '  +
 '             <tr>  '  +
 '               <td>Topic 7</td>  '  +
 '               <td>Vocab 7</td>  '  +
 '             </tr>  '  +
 '             <tr>  '  +
 '               <td>Topic 8</td>  '  +
 '               <td>Vocab 8</td>  '  +
 '             </tr>  '  +
 '             <tr>  '  +
 '               <td>Topic 9</td>  '  +
 '               <td>Vocab 9</td>  '  +
 '             </tr>  '  +
 '           </table>  '  +
 '         </div>  '  +
 '       </div>  '  +
 '    </div>  ' ;

document.write(info)

var cnt = 0;
function pressed(){
  cnt++;
  if(cnt%2 == 1){
    openNav();
  }else{
    closeNav();
  }
}
function openNav(){
  document.getElementById("overlay-menu").style.height = "100%";
  document.getElementById("subject-list").style.display = "block";
}
function closeNav(){
  document.getElementById("overlay-menu").style.height = "0%";
  document.getElementById("subject-list").style.display = "none";
}
