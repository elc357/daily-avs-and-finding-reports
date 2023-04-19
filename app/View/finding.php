<?php

// function optionHandler($status)
// {

//   if ($status == "Prepared") {

//     $preparedSelected = <<<PRE
//     <option selected value="Prepared">Prepared</option>
//     <option value="Monitoring">Monitoring</option>
//     <option value="Closed">Closed</option>
//     PRE;

//     return $preparedSelected;
//   } else if ($status == "Monitoring") {

//     $monitoringSelected = <<<MON
//     <option value="Prepared">Prepared</option>
//     <option selected value="Monitoring">Monitoring</option>
//     <option value="Closed">Closed</option>
//     MON;

//     return $monitoringSelected;
//   } else if ($status == "Closed") {

//     $closedSelected = <<<MON
//     <option value="Prepared">Prepared</option>
//     <option selected value="Monitoring">Monitoring</option>
//     <option value="Closed">Closed</option>
//     MON;

//     return $closedSelected;
//   }
// }

function frame(
  $status,
  $id,
  $name,
  $notif,
  $area,
  $equipment,
  $finddate,
  $findby,
  $funcloc,
  $description,
  $format
) {

  if ($status == "Prepared") {

    $status = <<<STAT
      <option selected value="Prepared">Prepared</option>
      <option value="Monitoring">Monitoring</option>
      <option value="Closed">Closed</option>
      STAT;
  } else if ($status == "Monitoring") {

    $status = <<<STAT
      <option value="Prepared">Prepared</option>
      <option selected value="Monitoring">Monitoring</option>
      <option value="Closed">Closed</option>
      STAT;
  } else if ($status == "Closed") {

    $status = <<<STAT
      <option value="Prepared">Prepared</option>
      <option value="Monitoring">Monitoring</option>
      <option selected value="Closed">Closed</option>
      STAT;
  }

  $name_format = str_replace(" ", "", $name);

  $date_format = date_create($finddate);
  $date_format = date_format($date_format, "d M Y H:i:s");


  // <div>$status</div>
  // action="/finding-update" 

  $frame = <<<FRAME
    <figure class="content">
      <div class="image">
        <img src="img/$name_format-$id.$format" alt="$description" />
      </div>
      <div action="/finding-test" method="post" class="info-box">
        <div class="info">
          <ul class="info-left">
            <li>Status</li>
            <li>Id</li>
            <li>Name</li>
            <li>Notif</li>
            <li>Area</li>
            <li>Equipment</li>
            <li>Date</li>
            <li>Find By</li>
            <li>Funcloc</li>
          </ul>
          <ul class="info-right">

            <li class="status-box">
              <select class="status" name="status" id="status">
                  $status
              </select>
              <input class="finding-status" name="finding-status" id="finding-status" type="hidden"/>
              <div class="status-light"></div>
            </li>

            <li class="id">
              <div>$id</div>
              <input class="finding-id" name="finding-id" id="finding-id" type="hidden"/>
              </li>
              
              <li contenteditable="true" spellcheck="false" class="name">
              <div>$name</div>
              <input class="finding-name" name="finding-name" id="finding-name" type="hidden"/>
            </li>

            <li contenteditable="true" spellcheck="false" class="notif">
              <div>$notif</div>
              <input class="finding-notif" name="finding-notif" id="finding-notif" type="hidden"/>
              </li>
              
              <li contenteditable="true" spellcheck="false" class="area">
              <div>$area</div>
              <input class="finding-area" name="finding-area" id="finding-area" type="hidden"/>
              </li>
              
              <li contenteditable="true" spellcheck="false" class="equipment">
              <div>$equipment</div>
              <input class="finding-equipment" name="finding-equipment" id="finding-equipment" type="hidden"/>
              </li>
              
              <li class="finddate">
              <div>$date_format</div>
              <input class="finding-finddate" name="finding-finddate" id="finding-finddate" type="hidden"/>
              </li>
              
              <li contenteditable="true" spellcheck="false" class="findby">
              <div>$findby</div>
              <input class="finding-findby" name="finding-findby" id="finding-findby" type="hidden"/>
              </li>
              
              <li contenteditable="true" spellcheck="false" class="funcloc">
              <div>$funcloc</div>
              <input class="finding-funcloc" name="finding-funcloc" id="finding-funcloc" type="hidden"/>
              </li>

              </ul>
        </div>
        <div>
          <p contenteditable="true" spellcheck="false" class="description" name="description" id="description">
            $description
          </p>
          <input class="finding-description" name="finding-description" id="finding-description" type="hidden"/>
        </div>
        <div class="button-div">
        <input type="submit" class="btn update" value="Update"/>
        <input type="button" class="btn delete" value="Delete"/>
        </div>
      </div>
    </figure>
    FRAME;

  return $frame;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <!-- mono -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

  <!-- icon -->
  <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="32x32" />
  <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="192x192" />

  <title><?= $model["title"] ?></title>
</head>

<style>
  <?php
  require __DIR__ . "/Style/finding.css";
  ?>
</style>

<body>
  <!-- <div class="text-output text1">Text output1</div>
  <div class="text-output text2">Text output2</div>
  <div class="text-output text3">Text output2</div> -->

  <div class="modal modal-active">
    <img src="" alt="Modal">
  </div>

  <div class="container">

    <section class="finding">

      <?php
      for ($i = 0; $i < sizeof($model["data"]); $i++) {
        echo frame(
          $model["data"][$i]->getStatus(),
          $model["data"][$i]->getId(),
          $model["data"][$i]->getName(),
          $model["data"][$i]->getNotif(),
          $model["data"][$i]->getArea(),
          $model["data"][$i]->getEquipment(),
          $model["data"][$i]->getFinddate(),
          $model["data"][$i]->getFindby(),
          $model["data"][$i]->getFuncloc(),
          $model["data"][$i]->getDescription(),
          $model["data"][$i]->getFormat(),
        );
      }
      ?>
    </section>


  </div>


  <script>
    let button_div = document.getElementsByClassName("button-div");
    let buttonUpdate = document.getElementsByClassName("update")
    let buttonDelete = document.getElementsByClassName("delete")

    let status = document.getElementsByClassName("status");
    let images = document.getElementsByClassName("image");
    let modal = document.getElementsByClassName("modal")[0];
    let findingDiv = document.getElementsByClassName("finding")[0];

    let id_common = document.getElementsByClassName("id");
    let name_common = document.getElementsByClassName("name");
    let notif_common = document.getElementsByClassName("notif");
    let area_common = document.getElementsByClassName("area");
    let equipment_common = document.getElementsByClassName("equipment");
    let date_common = document.getElementsByClassName("date");
    let findby_common = document.getElementsByClassName("findby");
    let funcloc_common = document.getElementsByClassName("funcloc");
    let description_common = document.getElementsByClassName("description");

    const status_common = document.getElementsByClassName("status");
    const findingStatus = document.getElementsByClassName("finding-status");
    const findingId = document.getElementsByClassName("finding-id");
    const findingName = document.getElementsByClassName("finding-name");
    const findingNotif = document.getElementsByClassName("finding-notif");
    const findingArea = document.getElementsByClassName("finding-area");
    const findingEquipment = document.getElementsByClassName("finding-equipment");
    const findingFindby = document.getElementsByClassName("finding-findby");
    const findingFuncloc = document.getElementsByClassName("finding-funcloc");
    const findingDescription = document.getElementsByClassName("finding-description");

    for (stat in status) {
      if (!isNaN(stat)) {
        if (status[stat].textContent.trim() == "Prepared") {
          status[stat].style.backgroundColor = "red";
          status[stat].style.color = "white";
        } else if (status[stat].textContent.trim() == "Monitoring") {
          status[stat].style.backgroundColor = "yellow";
        } else if (status[stat].textContent.trim() == "Closed") {
          status[stat].style.backgroundColor = "rgb(0, 255, 0)";
        }
      }
    }

    // ========================================
    // ============ SHOW IMG MODAL ============
    // ========================================
    for (img in images) {
      if (!isNaN(img)) {
        let photos = images[img].childNodes[1]

        photos.onclick = () => {
          modPhoto = modal.childNodes[1];
          modal.style.display = "block";
          modal.style.zIndex = "999";
          modPhoto.setAttribute("src", photos.getAttribute("src"));
          modPhoto.style.borderRadius = "0";
          modPhoto.style.opacity = "1";
          currentScrollTop = document.documentElement.scrollTop;

          if (document.documentElement.clientHeight > document.documentElement.clientWidth) {

            modal.style.height = "100vh";
            modal.style.position = "fixed";
            modal.style.width = "100%";
            modal.style.transition = "0.2s"

          } else {
            modal.style.position = "absolute";
            findingDiv.style.display = "none";

            value = (modal.clientHeight - document.documentElement.clientHeight) / 2
            document.documentElement.scrollTop = "0";
            document.documentElement.scrollTop = value;

          }

          modal.onclick = () => {

            findingDiv.style.display = "grid";
            modal.style.display = "none";
            document.documentElement.scrollTop = currentScrollTop;

          }
        }
      }
    }

    // ================================================
    // ============ ON CHANGE COLOR STATUS ============
    // ================================================
    for (let i = 0; i < status_common.length; i++) {
      status_common[i].onchange = () => {

        if (status_common[i].value == "Prepared") {

          statusLight[i].style.backgroundColor = "rgb(255, 0, 0)";
          statusLight[i].style.color = "white";

        } else if (status_common[i].value == "Monitoring") {

          statusLight[i].style.backgroundColor = "rgb(255, 245, 0)";

        } else if (status_common[i].value == "Closed") {

          statusLight[i].style.backgroundColor = "rgb(10, 200, 0)";

        }
      }
    }

    function putIntoInputStatus(name) {
      // TYPE STATUS IS INPUT SELECT
      name.setAttribute("value", name.previousElementSibling.value);
    }

    function putIntoInput(name) {
      // THIS INPUT TYPE IS TEXT
      name.setAttribute("value", name.previousElementSibling.textContent.trim());
    }

    const statusLight = document.getElementsByClassName('status-light');

    for (let i = 0; i < buttonUpdate.length; i++) {

      // ==============================================
      // ============ COLOR STATUS ON LOAD ============
      // ==============================================
      if (status_common[i].value == "Prepared") {

        statusLight[i].style.backgroundColor = "#ff0000";
        statusLight[i].style.color = "white";

      } else if (status_common[i].value == "Monitoring") {

        statusLight[i].style.backgroundColor = "#ffff00";

      } else if (status_common[i].value == "Closed") {

        statusLight[i].style.backgroundColor = "#0ac800";

      }


      // =========================================
      // ============ NAME VALIDATION ============
      // =========================================
      name_common[i].onblur = () => {
        if (name_common[i].firstElementChild.textContent.length < 3) {
          alert("⚠️ Name can't be less than three character!");
          name_common[i].firstElementChild.textContent = "#####";
        } else if (name_common[i].firstElementChild.textContent.length > 20) {
          alert("⚠️ Name can't be more than twenty character!")
          name_common[i].firstElementChild.textContent = "#####";
        }
      }

      // ==========================================
      // ============ NOTIF VALIDATION ============
      // ==========================================
      notif_common[i].onblur = () => {
        if (notif_common[i].firstElementChild.textContent.length < 8) {
          alert("⚠️ Notif number can't be less than eight character!");
          notif_common[i].firstElementChild.textContent = "########";
        } else if (notif_common[i].firstElementChild.textContent.length > 8) {
          alert("⚠️ Notif number can't be more than eight character!")
          notif_common[i].firstElementChild.textContent = "########";
        }
      }

      // ==========================================
      // ============ AREA VALIDATION =============
      // ==========================================
      area_common[i].onblur = () => {
        if (area_common[i].firstElementChild.textContent.length < 3) {
          alert("⚠️ Area can't be less than three character!");
          area_common[i].firstElementChild.textContent = "XXX";
        } else if (area_common[i].firstElementChild.textContent.length > 8) {
          alert("⚠️ Area can't be more than 3 character!")
          area_common[i].firstElementChild.textContent = "XXX";
        }
      }

      // ==========================================
      // ========== EQUIPMENT VALIDATION ==========
      // ==========================================
      equipment_common[i].onblur = () => {
        if (equipment_common[i].firstElementChild.textContent.length < 9) {
          alert("⚠️ Equipment can't be less than nine character!");
          equipment_common[i].firstElementChild.textContent = "XXXXXXXXX";
        } else if (equipment_common[i].firstElementChild.textContent.length > 9) {
          alert("⚠️ Equipment can't be more than nine character!")
          equipment_common[i].firstElementChild.textContent = "XXXXXXXXX";
        }
      }

      // ==========================================
      // =========== FUNCLOC VALIDATION ===========
      // ==========================================
      funcloc_common[i].onblur = () => {
        if (funcloc_common[i].firstElementChild.textContent.length < 5) {
          alert("⚠️ Funcloc can't be less than five character!");
          funcloc_common[i].firstElementChild.textContent = "FP-01-XXX-XXX-XXXX";
        } else if (funcloc_common[i].firstElementChild.textContent.length > 25) {
          alert("⚠️ Funcloc can't be more than twenty five character!")
          funcloc_common[i].firstElementChild.textContent = "FP-01-XXX-XXX-XXXX";
        }
      }

      // ========================================
      // ============ POST USING XHR ============
      // ========================================
      buttonUpdate[i].onclick = () => {


        putIntoInputStatus(findingStatus[i]);
        putIntoInput(findingId[i]);
        putIntoInput(findingName[i]);
        putIntoInput(findingNotif[i]);
        putIntoInput(findingArea[i]);
        putIntoInput(findingEquipment[i]);
        putIntoInput(findingFindby[i]);
        putIntoInput(findingFuncloc[i]);
        putIntoInput(findingDescription[i]);

        // if (user === "Erry Puji Anggoro") {
        //   findingStatus[i].value = "Monitoring";
        // }

        // CREATE XHR
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/finding-update", true);

        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")

        xhr.send(`finding-status=${findingStatus[i].value}&finding-id=${findingId[i].value}&finding-name=${findingName[i].value}&finding-notif=${findingNotif[i].value}&finding-area=${findingArea[i].value}&finding-equipment=${findingEquipment[i].value}&finding-findby=${findingFindby[i].value}&finding-funcloc=${findingFuncloc[i].value}&finding-description=${findingDescription[i].value}`);

        console.info(`finding-status=${findingStatus[i].value}`);
        alert("✅ Saved successfully");
      }

      // ========================================
      // ============ DELETE USING XHR ============
      // ========================================
      buttonDelete[i].onclick = () => {
        const id_deleted = id_common[i].firstElementChild.textContent
        // console.info("id : ", id_deleted);
        let yakin_hapus = confirm("⚠️ Are you sure ?");

        if (yakin_hapus) {
          const parent_of_content = id_common[i].parentElement.parentElement.parentElement.parentElement;
          parent_of_content.style.display = "none";

          const xhr = new XMLHttpRequest();
          xhr.open("POST", "/finding-delete", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
          xhr.send(`id=${id_deleted}`);
        }
      }
    }






    // // ====================================
    // // ============ USER LEVEL ============
    // // ====================================
    const user = '<?php echo $_SESSION['user'] ?>';

    if (user === "Administrator") {
      let button_div = document.getElementsByClassName("button-div");

      for (let i = 0; i < button_div.length; i++) {
        // button_div[i].style.display = "none";
        // status_common[i].disabled = true;

        // name_common[i].removeAttribute("contenteditable");
        // notif_common[i].removeAttribute("contenteditable");
        // area_common[i].removeAttribute("contenteditable");
        // equipment_common[i].removeAttribute("contenteditable");
        // findby_common[i].removeAttribute("contenteditable");
        // funcloc_common[i].removeAttribute("contenteditable");
        // description_common[i].removeAttribute("contenteditable");
      }
    } else if (user === "Erry Puji Anggoro") {

      // let button_div = document.getElementsByClassName("button-div");

      for (let i = 0; i < button_div.length; i++) {
        // button_div[i].style.display = "none";

        // status_common[i].disabled = true;

        button_div[i].lastElementChild.style.display = "none"; // button delete

        name_common[i].removeAttribute("contenteditable");
        // notif_common[i].removeAttribute("contenteditable");
        area_common[i].removeAttribute("contenteditable");
        equipment_common[i].removeAttribute("contenteditable");
        findby_common[i].removeAttribute("contenteditable");
        funcloc_common[i].removeAttribute("contenteditable");
        // description_common[i].removeAttribute("contenteditable");
      }
    } else if (user === "Taufiq" || user === "Rosiman" || user === "Nopriadi") {

      // let button_div = document.getElementsByClassName("button-div");

      for (let i = 0; i < button_div.length; i++) {

        // button_div[i].style.display = "none";

        // status_common[i].disabled = true;

        button_div[i].lastElementChild.style.display = "none"; // button delete

        name_common[i].removeAttribute("contenteditable");
        notif_common[i].removeAttribute("contenteditable");
        area_common[i].removeAttribute("contenteditable");
        equipment_common[i].removeAttribute("contenteditable");
        findby_common[i].removeAttribute("contenteditable");
        funcloc_common[i].removeAttribute("contenteditable");
        description_common[i].removeAttribute("contenteditable");
      }
    } else {
      // let button_div = document.getElementsByClassName("button-div");

      for (let i = 0; i < button_div.length; i++) {
        button_div[i].style.display = "none";

        button_div[i].lastElementChild.style.display = "none"; // button delete

        status_common[i].disabled = true;

        name_common[i].removeAttribute("contenteditable");
        notif_common[i].removeAttribute("contenteditable");
        area_common[i].removeAttribute("contenteditable");
        equipment_common[i].removeAttribute("contenteditable");
        findby_common[i].removeAttribute("contenteditable");
        funcloc_common[i].removeAttribute("contenteditable");
        description_common[i].removeAttribute("contenteditable");
      }
    }

    console.info(user);
  </script>
</body>

</html>