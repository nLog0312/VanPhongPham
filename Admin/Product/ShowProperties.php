<?php
    require_once './ShareAdmin/root/connect.php';

    $stringSQL = "SELECT * FROM `thuoctinh` WHERE `ten_thuoctinhcha` LIKE '%$search%' ORDER BY `ngaytao` DESC";

    $result = mysqli_query($connect, $stringSQL);

    if (mysqli_num_rows($result) > 0) {
        $lstthuoctinhcha = array();
        foreach ($result as $index => $each) {
            if ($each['ten_thuoctinhcon'] == null){
                array_push($lstthuoctinhcha, $each);
            }
        }
        foreach ($lstthuoctinhcha as $index => $each) {
            $index += 1;

            echo "<tr>";
                echo "<td class='text-center' style='width: 5%'>
                        <span>$index</span>
                </td>";
                echo "<td style='width: 20%'>" . ($each['ma_thuoctinh']) . "</td>";
                echo "<td>" . ($each['ten_thuoctinhcha']) . "</td>";
                echo "<td class='text-center'>
                    <div class='dropdown'>
                        <a class='btn dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            <svg width='24px' height='24px' viewBox='0 0 1024 1024' class='icon' version='1.1' xmlns='http://www.w3.org/2000/svg' fill='#000000'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'><path d='M539.4 550.9m-164.7 0a164.7 164.7 0 1 0 329.4 0 164.7 164.7 0 1 0-329.4 0Z' fill='#FFB89A'></path><path d='M679.3 405.4c-8.9-14-27.4-18.2-41.4-9.3-14 8.9-18.2 27.4-9.3 41.4 14 22.1 21.4 47.7 21.4 74 0 16.6 13.4 30 30 30s30-13.4 30-30c0-37.7-10.6-74.4-30.7-106.1z' fill='#33CC99'></path><path d='M607.4 611.4c-25.9 24.9-60 38.6-96 38.6-76.4 0-138.5-62.1-138.5-138.5S435 373 511.4 373c22.9 0 44.7 5.4 64.8 16 14.6 7.8 32.8 2.2 40.6-12.5 7.8-14.6 2.2-32.8-12.5-40.6-28.4-15.1-60.5-23-92.9-23-109.5 0-198.5 89.1-198.5 198.5C312.9 620.9 402 710 511.5 710c51.5 0 100.4-19.7 137.5-55.4 11.9-11.5 12.3-30.5 0.8-42.4-11.4-11.9-30.4-12.3-42.4-0.8z' fill='#33CC99'></path><path d='M853.7 370.4c-17.4-42.2-14.2-90.5 7.7-138.6a448.25 448.25 0 0 0-68.7-69c-48.2 21.8-96.6 24.9-138.8 7.4-42.3-17.6-74.3-54.2-92.8-104-16.4-1.8-33-2.7-49.8-2.7-15.9 0-31.6 0.8-47.1 2.5-18.7 49.8-50.7 86.4-93.1 104-42.5 17.6-91.2 14.1-139.7-8.2-25.2 20.2-48.1 43-68.4 68.1 22.3 48.6 25.6 97.3 7.9 139.9-17.7 42.6-54.6 74.6-104.9 93.1-1.7 16-2.6 32.3-2.6 48.7 0 16.1 0.9 32 2.5 47.6 50.2 18.6 87.1 50.8 104.7 93.4 17.6 42.6 14.1 91.3-8.2 139.9 20.2 25.1 43.1 48 68.3 68.3 48.6-22.2 97.3-25.5 139.8-7.8 42.4 17.6 74.3 54.3 92.9 104.2 15.8 1.7 31.9 2.6 48.2 2.6 16.5 0 32.7-0.9 48.7-2.6 18.7-49.8 50.7-86.3 93.1-103.8 42.2-17.4 90.6-14.2 138.8 7.7 25.4-20.4 48.5-43.5 68.9-68.9-21.8-48.2-24.9-96.5-7.3-138.7 17.5-42.1 53.9-74 103.3-92.5 1.8-16.2 2.7-32.7 2.7-49.3 0-16.3-0.9-32.4-2.6-48.2-49.8-19-86-50.9-103.5-93.1zM798 630.3c-21.8 52.5-21 110.8 0.6 168.3-57.5-21.7-115.8-22.7-168.3-1-52.6 21.7-93.2 63.5-118.6 119.4-25.3-56-65.8-97.9-118.3-119.7-25.8-10.7-53.1-16-80.9-16-28.8 0-58.2 5.6-87.4 16.6 21.7-57.5 22.7-115.8 1-168.3-21.7-52.6-63.5-93.2-119.4-118.6 56-25.3 97.9-65.8 119.7-118.3 21.8-52.5 21-110.8-0.6-168.3 29.4 11.1 59 16.8 87.9 16.8 27.7 0 54.7-5.2 80.4-15.8 52.6-21.7 93.2-63.5 118.6-119.4 25.3 56 65.8 97.9 118.3 119.7 52.5 21.8 110.8 21 168.3-0.6-21.7 57.5-22.7 115.8-1 168.3C820 446 861.8 486.6 917.7 512c-56 25.2-97.9 65.7-119.7 118.3z' fill='#45484C'></path></g></svg>
                        </a>
                        <ul class='dropdown-menu'>
                            <li class='d-flex align-items-center'>
                                <button type='button' class='dropdown-item d-flex align-items-center fs-5' data-bs-toggle='modal' data-bs-target='#addModal'>
                                    <ion-icon name='create-outline'></ion-icon>
                                    <span class='ms-4'>Sửa</spam>
                                </button>
                            </li>
                            <li class='d-flex align-items-center'>
                                <button type='button' class='dropdown-item d-flex align-items-center fs-5' data-bs-toggle='modal' data-bs-target='#deleteModal'>
                                    <ion-icon name='trash-outline'></ion-icon>
                                    <span class='ms-4'>Xoá</spam>
                                </button>
                            </li>
                        </ul>
                    </div>
                </td>";
        }
    }