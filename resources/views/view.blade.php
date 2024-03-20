

<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Single | To | Mingle</title>
    <link rel="stylesheet" href="{{asset('admin/assets/style.css')}}"/>
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
   
    <div class="sidebar">
      <div class="logo-details">
        {{-- <i class="bx bxl-c-plus-plus"></i> --}}
        <img src="upload/images/kiss.png" width="65" height="70" alt="" />
        <span class="logo_name" style="font-size:20px;">Single To Mingle</style></span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li class="active">
          <a href="{{route('logout')}}">
           
         
            <i class='bx bx-log-out' ></i>
            <span class="links_name">Logout</span>
          </a>
        </li>
        {{-- <li class="log_out">
          <a href="{{route('logout')}}">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li> --}}
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="{{route('view')}}">Dashboard</span>
        </div>
        {{-- <div class="search-box">
          <input type="text" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </div> --}}
       
        <div class="profile-details">
          <img src="{{ (!empty($adminData->image))? url('upload/add_images/'.$adminData->image):url('upload/no_image.jpg')}}" alt="" class="rounded-circle avatar-lg img-thumbnail"/>
          
          <span class="admin_name">Welcome  {{$adminData->name}}.</span>
          
         </div>
         
        
      </nav>

      

      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total User</div>
             
              <div class="number">{{count($all_admin_data)}}</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                @if(count($all_admin_data) < count($new_registration))
                <span class="text">Up from yesterday</span>
                @else
                <span class="text">Down from yesterday</span>
                @endif
                
              </div>
            </div>
            <div class="right-side">
                <div class="box-topic">New User</div>
               
                <div class="number">{{count($new_registration)}}</div>
                <div class="indicator">
                  <i class="bx bx-up-arrow-alt"></i>
                  <span class="text">Up from yesterday</span>
                </div>
              </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Sales</div>
              <div class="number">38,876</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Profit</div>
              <div class="number">$12,876</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Return</div>
              <div class="number">11,086</div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Down From Today</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title"><u>Data Table</u></div><br>
            <div class="sales-details">
              
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                
                <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
                
                <!-- jQuery library -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                
                <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                
                <!-- Latest compiled JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                
                <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Subject</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Image</th>
                                <th>Friend Request</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          @foreach ($not_need as $key=>$item )
                         
                          <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$item->name}}</td>
                              <td>{{$item->email}}</td>
                              <td>{{$item->address}}</td>
                              <td>{{$item->gender}}</td>
                              <td>{{$item->subject}}</td>
                              <td>{{$item->phone}}</td>
                              @foreach($city_table as $item1)
                              @if($item->city_id==$item1->id)
                              <td>{{$item1->city_name}}</td>
                              @endif
                              @endforeach
                              <td><img src="{{asset('upload/add_images/'.$item->image)}}" width="100px" alt="job image" title="job image"></td>
                            <?php
                            
                              if($del_user_view->status == 2)
                              {    
                                ?>                      
                              <td><a href="{{route('request',$item->id)}}"  class="btn btn-warning " id="f_request">Send Friend Request</a></td>
                              <?php
                              return $delete_req = FriendRequest::where('status',0)->where('id',$id)->update(['status' => 2]);
                              }
                              ?>
                      
                              
                              
                            </tr>
                            
                          @endforeach
                          
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Subject</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Image</th>
                                <th>Friend Request</th>
                            </tr>
                        </tfoot>
                    </table>
                    <script>
                        



$(document).ready(function() {
    $('#example').DataTable();
} )
                        </script>
              
           
            </div>
            
          </div>
          {{-- <div class="top-sales box">
            <div class="title">Top Seling Product</div>
            <ul class="top-sales-details">
              <li>
                <a href="#">
                  <img src="upload/images/sunglasses.jpg" alt="" />
                  <span class="product">Vuitton Sunglasses</span>
                </a>
                <span class="price">$1107</span>
              </li>
              <li>
                <a href="#">
                  <img src="upload/images/jeans.jpg" alt="" />
                  <span class="product">Hourglass Jeans </span>
                </a>
                <span class="price">$1567</span>
              </li>
              <li>
                <a href="#">
                  <img src="upload/images/nike-min.jpg" alt="" />
                  <span class="product">Nike Sport Shoe</span>
                </a>
                <span class="price">$1234</span>
              </li>
              <li>
                <a href="#">
                  <img src="upload/images/scarves.jpg" alt="" />
                  <span class="product">Hermes Silk Scarves.</span>
                </a>
                <span class="price">$2312</span>
              </li>
              <li>
                <a href="#">
                  <img src="upload/images/blueBag.jpg" alt="" />
                  <span class="product">Succi Ladies Bag</span>
                </a>
                <span class="price">$1456</span>
              </li>
              <li>
                <a href="#">
                  <img src="upload/images/bag.jpg" alt="" />
                  <span class="product">Gucci Womens's Bags</span>
                </a>
                <span class="price">$2345</span>
              </li>

              <li>
                <a href="#">
                  <img src="upload/images/addidas.jpg" alt="" />
                  <span class="product">Addidas Running Shoe</span>
                </a>
                <span class="price">$2345</span>
              </li>
              <li>
                <a href="#">
                  <img src="upload/images/shirt.jpg" alt="" />
                  <span class="product">Bilack Wear's Shirt</span>
                </a>
                <span class="price">$1245</span>
              </li>
            </ul>
          </div> --}}
        </div>
      </div>
    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>

  </body>
</html>
