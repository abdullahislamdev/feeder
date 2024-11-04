<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>All Feeders</h4>
                </div>
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Office Code</th>
                    <th>Office Name</th>
                    <th>XEN Mobile</th>
                    <th>One stop Mobile</th>
                    <th>One stop Phone</th>
                    <th>Feeder Name</th>
                    <th>Feeder Incharge Mobile</th>
                    <th>Area</th>
                    <th>Office Address</th>
                </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    getList();
    async function getList(){
        // showLoader();
        let res = await axios.get('/get-feeder');
        hideLoader();

        let tableData = $('#tableData');
        let tableList = $("#tableList");

        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function(feeder,index){
            // const {code,name,xen_mobile} = customer.office
            const {id,name,incharge_mobile,area} = feeder
            let row =`
                <tr>
                    <td>${id}</td>
                    <td>${feeder.office['code']}</td>
                    <td>${feeder.office['name']}</td>
                    <td>${feeder.office['xen_mobile']}</td>
                    <td>${feeder.office['one_stop_mobile']}</td>
                    <td>${feeder.office['one_stop_phone']}</td>
                    <td>${name}</td>
                    <td>${incharge_mobile}</td> 
                    <td>${area}</td> 
                    <td>${feeder.office['address']}</td>
                </tr>
            `
            tableList.append(row);
        }
    )
            new DataTable( '#tableData', {
            order:[[0,'desc']],
            lengthMenu:[5,10,15,20,30]
        } );

    }

</script>

