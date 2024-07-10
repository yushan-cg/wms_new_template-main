<div>

<!--Zone1-->
<h2 style="text-align: center">ZONE 1</h2>

<div class="row">
    <div class="col-auto">
        <!-- Bootstrap dropdown -->
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="viewSelectorDropdownZone1" data-bs-toggle="dropdown" aria-expanded="false">
        Icon <!-- Default text -->
    </button>
    <ul class="dropdown-menu" aria-labelledby="viewSelectorDropdownZone1">
        <li><a class="dropdown-item" href="#" data-value="icon" data-zone="zone1">Icon</a></li>
        <li><a class="dropdown-item" href="#" data-value="table" data-zone="zone1">Table</a></li>
    </ul>
</div>
    </div>

    <div class="col-auto ms-auto">
                <!-- Search Input -->
        <div class="mb-3" id="searchContainerZone1" style="display: none;">
            <label for="searchZone1" class="form-label" style="display: inline-block; width: 80px;">Search:</label>
            <input type="text" class="form-control" id="searchZone1" style="display: inline-block; width: calc(100% - 90px);" placeholder="Search...">
        </div>
    </div>
</div>







<div class="zone-container">
    <div id="zone1-icon" class="grid-container-zone1">
        <?php $data = true; ?> <!-- Initialize $data outside the loop -->
        @foreach(range(1, 21) as $row)
        @foreach(range('A', 'F') as $column)
        @for($i = 22; $i >= 1; $i--)
            @if($row == (22 - $i))
                <?php $rack_row = 0 + $i; ?>
            @endif
        @endfor
        <?php
        $data = DB::table('location')->where('LocationCode', '=','Z1-' . $column . '-F' . $rack_row)->first();
        $full = false;
        $partial = false;

        if($data) {
            if($data->Occupied >= $data->Capacity) {
                $full = true;
            } else {
                $partial = true;
            }
        }
        ?>
        <?php $found = false; ?>

        <div class="section-box @if($full ) bg-full @elseif($partial) bg-occupied @else bg-empty @endif">
            <a href="#">
                <h4 class="text-white my-0">
                    {{ $column }}-F{{ $rack_row }}
                </h4>
                <div class="box-dec">
                    <div class="section-rack d-flex align-items-center" @if($full ) style="background-color:rgba(255, 140, 0, 0.9)" @elseif($partial) style="background-color: rgba(0, 135, 90, 0.9);" @else style="background-color: #A8A8A8" @endif>
                        <div class="box-img">
                            <img src="{{ asset('assets/images/box.png') }}" class="img-fluid" alt="" />
                        </div>
                        <div class="dec">
                            <h4 class="text-white my-0">
                                @if($data)
                                    @if($data->LocationType == 1)
                                        <?php
                                        $LocationTypeName = "Floor";
                                        $content = $data->Occupied . '/' . $data->Capacity;
                                        ?>
                                    @endif

                                    {{ $LocationTypeName }}
                                    <br>
                                    {{ $column }}-F{{ $rack_row }}
                                    <hr>
                                    {{ $content }}
                                    <?php $found = true; ?> {{-- Set $found to true --}}

                                @endif

                                {{-- If data not found --}}
                                @if(!$found)
                                    Empty
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @endforeach
    </div>

    <!-- Table -->
    <div class="container" style="height: 500px; overflow-y: auto;">
        <div id="zone1-table" class="grid-container-zone1" style="display: none;">




            <table class="table">
                <thead>
                    <tr>
                        <th>Location Code</th>
                        <th>Occupied/Capacity</th>
                        <th>Stock Level</th>
                        <th>Label</th>
                    </tr>
                </thead>
                <tbody id="zone1-table-body">
                    @foreach(range('A', 'F') as $column)
                    @foreach(range(1, 21) as $row)
                        <?php
                        $rack_row = $row;
                        $data = DB::table('location')->where('LocationCode', '=','Z1-' . $column . '-F' . $rack_row)->first();
                        $occupied_capacity = $data ? $data->Occupied . '/' . $data->Capacity : '-';
                        $stock_level = '-';
                        $label = '';

                        if($data) {
                            if($data->Occupied >= $data->Capacity) {
                                $stock_level = 'Full';
                                $label = '<span class="badge bg-full">Full</span>';
                            } else {
                                $stock_level = 'Occupied';
                                $label = '<span class="badge bg-occupied">Occupied</span>';
                            }
                        }
                        ?>
                        <tr>
                            <td>{{$column . '-F' . $rack_row }}</td>
                            <td>{{ $occupied_capacity }}</td>
                            <td>{{ $stock_level }}</td>
                            <td>{!! $label !!}</td>
                        </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchZone1 = document.getElementById('searchZone1');
    const searchContainerZone1 = document.getElementById('searchContainerZone1');

    function filterTable(input, tableId) {
        const filter = input.value.toLowerCase();
        const rows = document.querySelectorAll(`#${tableId} tbody tr`);

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    }

    searchZone1.addEventListener('input', function() {
        filterTable(this, 'zone1-table');
    });

    const dropdownItems = document.querySelectorAll('#viewSelectorDropdownZone1 ~ .dropdown-menu .dropdown-item');
    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            const view = this.getAttribute('data-value');
            const iconView = document.getElementById('zone1-icon');
            const tableView = document.getElementById('zone1-table');
            const searchContainer = document.getElementById('searchContainerZone1');

            if (view === 'icon') {
                //iconView.style.display = 'block';
                tableView.style.display = 'none';
                searchContainer.style.display = 'none';
            } else if (view === 'table') {
                iconView.style.display = 'none';
                tableView.style.display = 'block';
                searchContainer.style.display = 'block';
            }
        });
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById('viewSelectorDropdownZone1');
    const dropdownItems = document.querySelectorAll('#viewSelectorDropdownZone1 ~ .dropdown-menu .dropdown-item');

    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            const view = this.getAttribute('data-value');
            dropdownButton.textContent = view === 'icon' ? 'Icon' : 'Table';
        });
    });
});

</script>



</div>


