<style>
    .bg-full {
           background-color: #FF5733;
       }
       .bg-occupied {
           background-color:  #05a322;
       }

       .bg-empty {
           background-color: #808080;
       }

       .content-container{
           padding-top: 20px;

       }

       .content-container1{
           justify-content: center;
           align-items: center;
       }
       .zone-container {
        justify-content: center;
           align-items: center;
           padding-top: 20px;
           padding-bottom: 80px;
           width: 100%;
           display: flex;

       }
       .grid-container-zone1 {
           display: grid;
           grid-template-columns: repeat(6, 1fr);
           gap: 10px;
       }
       .grid-container-zone2 {
           display: grid;
           grid-template-columns: repeat(7, 1fr);
           gap: 10px;
       }

       .section-box {
           border-radius: 10px;
           width: 110px;
           padding-bottom: 50px; /* Maintain aspect ratio */
           position: relative;
       }


       .section-box a .box-dec {
            display: none;
       }

       .section-box a {
           position: absolute;
           margin-bottom: 5px;
           width: calc(100% - 10px); /* Adjust for gap */
           height: calc(100% - 10px); /* Adjust for gap */
           border-radius: 10px;
           display: flex;
           justify-content: center;
           align-items: center;
           text-decoration: none;
           color: #fff;
       }


       .section-box a .section-rack {
       position: absolute;
       //background-color: rgba(0, 135, 90, 0.9);
       border-radius: 10px;
       padding: 10px;
       -webkit-box-shadow: 0 5px 15px 4px rgba(0, 135, 90, 0.25);
       box-shadow: 0 5px 15px 4px rgba(0, 135, 90, 0.25);
       margin-top: 20px;
       margin-left: 20px;
       z-index: 99; }

     .section-box a .section-rack img {
       max-width: 100px;
       margin-right: 10px;
       padding: 10px;
       background-color: #0ca773;
       border-radius: 10px; }

       .section-box a:hover .box-dec {
       display: block; }

       .box-img {
           margin-right: 10px;
       }

       .box-img img {
           max-width: 100%;
           max-height: 100%;
       }

       .dec {
           flex: 1;
           text-align: center;
       }
   </style>

<div class="content-container">
    <div class="container">
        <select id="rackSelector" class="form-select form-select-lg mb-3 w-25 " aria-label="Default select example">
            <option value="zone1">Zone 1</option>
            <option value="zone2">Zone 2</option>
        </select>

        <div id="zone1Content" class="zone-container">
            <!-- Content for Zone 1 -->
            @include('backend.rack.zone1')
        </div>

        <div id="zone2Content" class="zone-container" style="display: none;">
            <!-- Content for Zone 2 -->
            @include('backend.rack.zone2')
        </div>

    </div>
</div>

<script>
    document.getElementById('rackSelector').addEventListener('change', function() {
        const selectedValue = this.value;
        const zone1Content = document.getElementById('zone1Content');
        const zone2Content = document.getElementById('zone2Content');

        // Show the selected zone content and hide the other
        if (selectedValue === 'zone1') {
            zone1Content.style.display = 'block';
            zone2Content.style.display = 'none';
        } else if(selectedValue === 'zone2') {
            zone1Content.style.display = 'none';
            zone2Content.style.display = 'block';
        } else {
            // Handle other cases if needed
        }
    });
</script>

<script>
    // JavaScript to handle Bootstrap dropdown selection for both zones
    // This script is applied globally to all dropdown items with data-zone attribute

    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', event => {
            const selectedValue = event.target.getAttribute('data-value');
            const zone = event.target.getAttribute('data-zone');
            handleViewSelection(selectedValue, zone);
        });
    });

    // Function to handle view selection
    function handleViewSelection(selectedValue, zone) {
        if(selectedValue === 'icon') {
            $(`#${zone}-icon`).show();
            $(`#${zone}-table`).hide();
        } else if(selectedValue === 'table') {
            $(`#${zone}-icon`).hide();
            $(`#${zone}-table`).show();
        }
    }
</script>
