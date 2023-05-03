<?php

defined( 'ABSPATH' ) || exit;

global $product;
global $subscription;

 ?>
<?php
// START - GET SUBSCRIPTION STATUS LOOP
$subscriptions = wcs_get_subscriptions( array(
    'customer_id'            => get_current_user_id()
));
$active_sub_count = 0;
$non_active_sub_count = 0;
foreach($subscriptions as $subscription)
{
    foreach( $subscription->get_items() as $item_id => $item )
    {
        $sub_status = $subscription->get_data()['status'];
        if ($sub_status == 'active'){
            $active_sub_count ++;
        };
        if ($sub_status == 'on-hold'){
            $non_active_sub_count ++;
        }
    }
}
// END - GET SUBSCRIPTION STATUS LOPP
?>

<div class="subscription-content">
    <h1>Subscriptions</h1>
    <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="subscription-card-button">
        Hire an Empoyee
    </a>
    <div class="my-account-dashboard-table">
        <div class="dashboard-table-header">
            <div class="dashboard-table-toggle-button">
                <div class="dashboard-table-toggle-cards active">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 3H10V10H3V3Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 3H21V10H14V3Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 14H21V21H14V14Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 14H10V21H3V14Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="dashboard-table-toggle-table">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12H21" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 6H13" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 18H21" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            <!-- <div class="dashboard-table-sort">
                <span>Sort by:</span>
                <div class="dropdown"> -->
                <!-- <a href="#" class="js-link">From new
                    <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.8627 0H1.1559C0.717908 0 0.491595 0.523188 0.791512 0.84238L6.20855 6.60756C6.40763 6.81943 6.74481 6.81743 6.94136 6.60322L12.2311 0.838035C12.5253 0.51739 12.2978 0 11.8627 0Z" fill="#005BBB"/>
                    </svg>
                </a>
                <ul class="js-dropdown-list">
                    <li>Option 1</li>
                    <li>Option 2</li>
                    <li>Option 3</li>
                    <li>* Reset</li>
                </ul> -->

                <!-- <select id="sort-select" class="dropdown">
                    <option>From New</option>
                    <option>Total (increase)</option>
                    <option>Total (decrease)</option>
                    <option>Time remaining (less)</option>
                    <option>Time remaining (more)</option>
                </select> -->
            <!-- </div>
        </div> -->
    </div>
<table id="table" cellspacing="0" cellpadding="0" class="custom-table">
  <thead class="legend-table">
    <tr>
      <th>Employee</th>
      <th>Position</th>
      <th>Period</th>
      <th>Total</th>
      <th>Type</th>
      <th>Time remeining</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody id="paginated-list" data-current-page="1" aria-live="polite" class="tbody-employess">
 <?php
     foreach($subscriptions as $subscription)
            {
                foreach( $subscription->get_items() as $item_id => $item )
                {
                    $_product  = apply_filters( 'woocommerce_subscriptions_order_item_product', $item->get_product(), $item );
                    $product_name = $item->get_name();
                    $product_position = get_field('current_position', $item['product_id']);
                    $product_order_id = $item->get_order_id();
                    $product_subs_id = $subscription->get_data()['parent_id'];
                    $actions = wc_get_account_orders_actions( $product_subs_id );
                    $order_period = $item->get_meta( 'choose-work-period', true );
                    $order_type_employee = $item->get_meta( 'choose-type-of-employment', true );
                    $order_sub_price = $item->get_subtotal();
                    $sub_status = $subscription->get_data()['status'];
                    $sub_start = $subscription->get_data()['schedule_start']->format('d.m.Y');
                    $sub_end = $subscription->get_data()['schedule_end'];
                    $sub_end_timer = $subscription->get_data()['schedule_end'];
                    if ($sub_end_timer === null){
                        $sub_end_timer = $subscription->get_data()['schedule_end'];
                    } else {
                        $sub_end_timer = $subscription->get_data()['schedule_end']->format('m d, Y H:i:s');
                    }
                    ?>
                                          <script type="text/javascript"> 
    jQuery(document).ready(function(){
       spge = "<?php echo $sub_end_timer ;?>"; 
        var countDownDate = new Date(spge).getTime();
        var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hoursdays = Math.floor(distance / (1000 * 60 * 60 * 24) * 24);
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById('<?php echo $product_subs_id; ?>').innerHTML = days + "d " + hours + ":" + minutes + ":" + seconds; 
           if (distance < 0) {
               clearInterval(x);
                 document.getElementById('<?php echo $product_subs_id; ?>').innerHTML = "00:00:00";
           }
        });
    });
</script>
<tr class="tr-employee-item">
                          <td class="col-employee">
                                <div class="employee_sub_img">
                                    <div class="img_sub">
                                        <?php
                                        echo (apply_filters( 'woocommerce_cart_item_thumbnail', sprintf('<a href="%s" target="_blank">%s</a>', esc_url($product), $_product->get_image()) ));
                                        ?>
                                    </div>
                                    <?php
                                    echo '<div><span>' . $product_name . '</span></div>';
                                    ?>
                                </div>
                            </td>
                          
                          <td class="col-position"><?php echo $product_position; ?></td>
                          <td class="col-period"><?php echo $sub_start; ?></td>
                          <td class="col-total"><?php echo $order_sub_price; ?>$</td>
                          <td class="col-type"><?php echo $order_type_employee; ?></td>
                          <td class="col-time-remeining" id="<?php echo $product_subs_id; ?>"></td>
                          <td class="col-actions">
                            <div class="dropdown-simple">
                                <p style="cursor:pointer;" class="dropdown-link-action">
                                        <svg width="23" height="5" viewBox="0 0 23 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                            <circle cx="11.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                            <circle cx="20.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                        </svg>
                                </p>
                                    <ul class="dropdown-list-simple">
                                        <?php
                                        foreach ( $actions as $key => $action ) {
                                            echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a><br>';
                                        } ?>
                                    </ul>
                            </div>
                        </td>
                      </tr>
                    <?php
                }
            }
    ?>
  </tbody>
</table>

<nav class="pagination-container" style="display:none;">
  <button class="pagination-button" id="prev-button" title="Previous page" aria-label="Previous page">
    <span class="pagination-button-arrow"></span>
  </button>
   
  <div id="pagination-numbers">
 
  </div>
   
  <button class="pagination-button" id="next-button" title="Next page" aria-label="Next page">
  <span class="pagination-button-arrow"></span>
  </button>
</nav>

        <div class="dashboard-table-cards visible">

        <?php

                foreach($subscriptions as $subscription)
                {
                    foreach( $subscription->get_items() as $item_id => $item )
                    {
                        $_product  = apply_filters( 'woocommerce_subscriptions_order_item_product', $item->get_product(), $item );
                        $product_name = $item->get_name();
                        $product_position = get_field('current_position', $item['product_id']);
                        $product_order_id = $item->get_order_id();
                        $product_subs_id = $subscription->get_data()['parent_id'];
                        $actions = wc_get_account_orders_actions( $product_subs_id );
                        $order_period = $item->get_meta( 'choose-work-period', true );
                        $order_type_employee = $item->get_meta( 'choose-type-of-employment', true );
                        $order_sub_price = $item->get_subtotal();
                        $sub_status = $subscription->get_data()['status'];
                        $sub_start = $subscription->get_data()['schedule_start']->format('d.m.Y');
                        $sub_end = $subscription->get_data()['schedule_end'];
                        $sub_end_timer = $subscription->get_data()['schedule_end'];
                        if ($sub_end_timer === null){
                            $sub_end_timer = $subscription->get_data()['schedule_end'];
                        } else {
                            $sub_end_timer = $subscription->get_data()['schedule_end']->format('m d, Y H:i:s');
                        }
                        if ($sub_end === null){
                            $sub_end = $subscription->get_data()['schedule_end'];
                        } else {
                            $sub_end = $subscription->get_data()['schedule_end']->format('d.m.Y');
                        }

                        if ($sub_status == 'active'){
                            $active_sub_count ++;
                        };
                        if ($sub_status == 'on-hold'){
                            $non_active_sub_count ++;
                        }
                        ?>  
            <div class="dashboard-table-card">
                <div class="dashboard-table-card-action dropdown-simple-card">
                                <p style="cursor:pointer;" class="dropdown-link-action">
                                    <svg width="23" height="5" viewBox="0 0 23 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="2.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                        <circle cx="11.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                        <circle cx="20.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                    </svg>
                                </p>
                                <ul class="dropdown-list-simple">
                                    <?php
                                    foreach ( $actions as $key => $action ) {
                                        echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a><br>';
                                    } ?>
                                </ul>
                </div>
                <div class="dashboard-table-card-person">
                <div class="user_acc_image">
                <?php echo (apply_filters( 'woocommerce_cart_item_thumbnail', sprintf('<a href="%s" target="_blank">%s</a>', esc_url($product), $_product->get_image()) ));?>
                </div>
                    <span class="dashboard-table-card-person-name"><?php echo $product_name; ?></span>
                    <div class="dashboard-table-card-person-position"><?php echo $product_position; ?></div>
                </div>
                <div class="dashboard-table-card-info">
                    <div class="dashboard-table-card-info-item">
                        <div class="dashboard-table-card-info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2.25C6.61547 2.25 2.25 6.61547 2.25 12C2.25 17.3845 6.61547 21.75 12 21.75C17.3845 21.75 21.75 17.3845 21.75 12C21.75 6.61547 17.3845 2.25 12 2.25ZM16.5 13.5H12C11.8011 13.5 11.6103 13.421 11.4697 13.2803C11.329 13.1397 11.25 12.9489 11.25 12.75V6C11.25 5.80109 11.329 5.61032 11.4697 5.46967C11.6103 5.32902 11.8011 5.25 12 5.25C12.1989 5.25 12.3897 5.32902 12.5303 5.46967C12.671 5.61032 12.75 5.80109 12.75 6V12H16.5C16.6989 12 16.8897 12.079 17.0303 12.2197C17.171 12.3603 17.25 12.5511 17.25 12.75C17.25 12.9489 17.171 13.1397 17.0303 13.2803C16.8897 13.421 16.6989 13.5 16.5 13.5Z" fill="#5A5A5A"/>
                            </svg>
                        </div>
                        <div class="dashboard-table-card-info-term">
                            <?php 
                            if ($order_type_employee == null){
                                echo 'Unset'; 
                                } else {
                                echo $order_type_employee; 
                            }
                            ?>
                            </div>
                    </div>
                    <div class="dashboard-table-card-info-item">
                        <div class="dashboard-table-card-info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.625 21C2.625 21.4148 2.96016 21.75 3.375 21.75H20.625C21.0398 21.75 21.375 21.4148 21.375 21V11.1562H2.625V21ZM20.625 4.6875H16.6875V3.1875C16.6875 3.08437 16.6031 3 16.5 3H15.1875C15.0844 3 15 3.08437 15 3.1875V4.6875H9V3.1875C9 3.08437 8.91563 3 8.8125 3H7.5C7.39687 3 7.3125 3.08437 7.3125 3.1875V4.6875H3.375C2.96016 4.6875 2.625 5.02266 2.625 5.4375V9.5625H21.375V5.4375C21.375 5.02266 21.0398 4.6875 20.625 4.6875Z" fill="#5A5A5A"/>
                            </svg>

                        </div>
                        <div class="dashboard-table-card-info-term"><?php echo $sub_start; ?> - <?php echo $sub_end; ?></div>
                    </div>
                    <div class="dashboard-table-card-info-item">
                        <div class="dashboard-table-card-info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.9999 12C18.7599 12 20.9999 9.76 20.9999 7C20.9999 4.24 18.7599 2 15.9999 2C13.2399 2 10.9999 4.24 10.9999 7C10.9999 9.76 13.2399 12 15.9999 12ZM21.4499 17.6C21.0599 17.2 20.5699 17 19.9999 17H12.9999L10.9199 16.27L11.2499 15.33L12.9999 16H15.7999C16.1499 16 16.4299 15.86 16.6599 15.63C16.8899 15.4 16.9999 15.12 16.9999 14.81C16.9999 14.27 16.7399 13.9 16.2199 13.69L8.94989 11H6.99989V20L13.9999 22L22.0299 19C22.0399 18.47 21.8399 18 21.4499 17.6ZM4.99989 11H0.983887V22H4.99989V11Z" fill="#5A5A5A"/>
                            </svg>

                        </div>
                        <div class="dashboard-table-card-info-term">$<?php echo $order_sub_price; ?></div>
                    </div>
                    <div class="dashboard-table-card-info-item">
                        <div class="dashboard-table-card-info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.79999 0.8C8.79999 0.587827 8.88428 0.384344 9.03431 0.234315C9.18434 0.0842855 9.38782 0 9.59999 0L14.4 0C14.6122 0 14.8157 0.0842855 14.9657 0.234315C15.1157 0.384344 15.2 0.587827 15.2 0.8C15.2 1.01217 15.1157 1.21566 14.9657 1.36569C14.8157 1.51571 14.6122 1.6 14.4 1.6H12.8V3.392C14.507 3.52273 16.1535 4.08184 17.5872 5.0176C17.619 4.97324 17.6543 4.93151 17.6928 4.8928L19.2928 3.2928C19.3857 3.19993 19.4959 3.12626 19.6173 3.076C19.7386 3.02574 19.8687 2.99987 20 2.99987C20.1313 2.99987 20.2614 3.02574 20.3827 3.076C20.5041 3.12626 20.6143 3.19993 20.7072 3.2928C20.8001 3.38567 20.8737 3.49592 20.924 3.61727C20.9743 3.73861 21.0001 3.86866 21.0001 4C21.0001 4.13134 20.9743 4.26139 20.924 4.38273C20.8737 4.50408 20.8001 4.61433 20.7072 4.7072L19.1472 6.2672C20.8229 7.90096 21.8884 10.0594 22.1664 12.3832C22.4443 14.707 21.9178 17.0558 20.6746 19.0387C19.4314 21.0215 17.5465 22.5187 15.3338 23.2809C13.121 24.0431 10.714 24.0244 8.51337 23.2278C6.31277 22.4312 4.45144 20.9048 3.2393 18.9028C2.02716 16.9009 1.53735 14.5441 1.85145 12.2249C2.16554 9.90574 3.26457 7.76414 4.96554 6.1567C6.66652 4.54925 8.86679 3.57297 11.2 3.3904V1.6H9.59999C9.38782 1.6 9.18434 1.51571 9.03431 1.36569C8.88428 1.21566 8.79999 1.01217 8.79999 0.8ZM3.35999 13.6C3.35999 11.3085 4.27028 9.11091 5.89059 7.4906C7.51091 5.87028 9.70852 4.96 12 4.96C14.2915 4.96 16.4891 5.87028 18.1094 7.4906C19.7297 9.11091 20.64 11.3085 20.64 13.6C20.64 15.8915 19.7297 18.0891 18.1094 19.7094C16.4891 21.3297 14.2915 22.24 12 22.24C9.70852 22.24 7.51091 21.3297 5.89059 19.7094C4.27028 18.0891 3.35999 15.8915 3.35999 13.6ZM12 13.6V6.56C10.8422 6.55986 9.70224 6.84527 8.6811 7.39095C7.65996 7.93664 6.78917 8.72575 6.14586 9.68837C5.50255 10.651 5.1066 11.7574 4.99306 12.9096C4.87953 14.0619 5.05192 15.2243 5.49497 16.294C5.93802 17.3636 6.63805 18.3075 7.53305 19.042C8.42804 19.7765 9.49038 20.2789 10.6259 20.5048C11.7615 20.7306 12.9352 20.6729 14.0431 20.3367C15.1511 20.0006 16.159 19.3964 16.9776 18.5776L12 13.6Z" fill="#5A5A5A"/>
                            </svg>
                        </div>
                        <div style="color: var(--rh-green-color);" class="dashboard-table-card-info-term">
                        <script type="text/javascript"> 
                            jQuery(document).ready(function(){
                                spge1 = "<?php echo $sub_end_timer ;?>"; 
                                    var countDownDate1 = new Date(spge1).getTime();
                                    var x1 = setInterval(function() {
                                    var now1 = new Date().getTime();
                                    var distance1 = countDownDate1 - now1;
                                    var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
                                    var hoursdays1 = Math.floor(distance1 / (1000 * 60 * 60 * 24) * 24);
                                    var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);
                                document.getElementById('<?php echo $product_order_id; ?>').innerHTML = days1 + "d " + hours1 + ":" + minutes1 + ":" + seconds1; 
                                if (distance1 < 0) {
                                    clearInterval(x1);
                                        document.getElementById('<?php echo $product_order_id; ?>').innerHTML = "00:00:00";
                                    }
                                });
                            });
                        </script>
                        <?php 
                            if ($order_period == null){
                                echo 'Unset'; 
                                } else {
                                ?>
                                <div id="<?php echo $product_order_id; ?>" class="time_count_end"></div>
                                <?php
                                //echo '<div class="custom-table-td"><span>'. $order_period . '</span></div>';
                            }
                            ?>
                            </div>
                    </div>
                </div>
                <div class="dashboard-table-card-button">Add more time
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 17V9M9 9V1M9 9H17M9 9H1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>

                </div>
            </div>
        
        <?php
                    }
                }
                ?>
</div>
    </div>
</div>
<script>
    // table with employees item pagination for mobile devices
if (document.documentElement.clientWidth < 768) {
    const paginationNumbers = document.getElementById("pagination-numbers");
const paginatedList = document.getElementById("paginated-list");
const listItems = paginatedList.querySelectorAll(".tr-employee-item");
const nextButton = document.getElementById("next-button");
const prevButton = document.getElementById("prev-button");

const paginationLimit = 1;
const pageCount = Math.ceil(listItems.length / paginationLimit);
let currentPage = 1;

const disableButton = (button) => {
  button.classList.add("disabled");
  button.setAttribute("disabled", true);
};

const enableButton = (button) => {
  button.classList.remove("disabled");
  button.removeAttribute("disabled");
};

const handlePageButtonsStatus = () => {
  if (currentPage === 1) {
    disableButton(prevButton);
  } else {
    enableButton(prevButton);
  }

  if (pageCount === currentPage) {
    disableButton(nextButton);
  } else {
    enableButton(nextButton);
  }
};

const handleActivePageNumber = () => {
  document.querySelectorAll(".pagination-number").forEach((button) => {
    button.classList.remove("active");
    const pageIndex = Number(button.getAttribute("page-index"));
    if (pageIndex == currentPage) {
      button.classList.add("active");
    }
  });
};

const appendPageNumber = (index) => {
  const pageNumber = document.createElement("button");
  pageNumber.className = "pagination-number";
  pageNumber.innerHTML = index;
  pageNumber.setAttribute("page-index", index);
  pageNumber.setAttribute("aria-label", "Page " + index);

  paginationNumbers.appendChild(pageNumber);
};

const getPaginationNumbers = () => {
  for (let i = 1; i <= pageCount; i++) {
    appendPageNumber(i);
  }
};

const setCurrentPage = (pageNum) => {
  currentPage = pageNum;

  handleActivePageNumber();
  handlePageButtonsStatus();
  
  const prevRange = (pageNum - 1) * paginationLimit;
  const currRange = pageNum * paginationLimit;

  listItems.forEach((item, index) => {
    item.classList.add("hidden");
    if (index >= prevRange && index < currRange) {
      item.classList.remove("hidden");
    }
  });
};

window.addEventListener("load", () => {
  getPaginationNumbers();
  setCurrentPage(1);

  prevButton.addEventListener("click", () => {
    setCurrentPage(currentPage - 1);
  });

  nextButton.addEventListener("click", () => {
    setCurrentPage(currentPage + 1);
  });

  document.querySelectorAll(".pagination-number").forEach((button) => {
    const pageIndex = Number(button.getAttribute("page-index"));

    if (pageIndex) {
      button.addEventListener("click", () => {
        setCurrentPage(pageIndex);
      });
    }
  });
});
}
            </script>
