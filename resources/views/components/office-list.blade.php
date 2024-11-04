<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Office</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Code</th>
                    <th>Office Name</th>
                    <th>Xen Mobile</th>
                    <th>One Stop Mobile</th>
                    <th>One Stop Phone</th>
                    {{-- <th>Action</th> --}}
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
        let res = await axios.get('/office-list');
        hideLoader();

        let tableData = $('#tableData');
        let tableList = $("#tableList");

        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function(office,index){
                const{id,code,name,address,xen_mobile,one_stop_mobile,one_stop_phone} = office
            let row =`
                <tr>
                    <td>${id}</td>
                    <td>${code}</td>
                    <td>${name}</td>
                    <td>${xen_mobile}</td>
                    <td>${one_stop_mobile}</td>
                    <td>${one_stop_phone}</td>
                    
                    <td>${address}</td>
                    </tr>
                    `
                    tableList.append(row);
                }
            )
            new DataTable( '#tableData', {
                // <td>
                //     <button data-id="${id}" class="btn editBtn btn-sm-button btn-outline-success" >Edit</button>
                //     <button data-id="${id}" class="btn deleteBtn btn-sm-button btn-outline-danger" >Delete</button>
                // </td>
            order:[[0,'desc']],
            lengthMenu:[5,10,15,20,30]
        } );


        $('.editBtn').on('click',async function(){
            let id = $(this).data('id');
            await FillUpdateForm(id);
            $('#update-modal').modal('show');
            
        })

        $('.deleteBtn').on('click',function(){
            let id = $(this).data('id');
            $('#delete-modal').modal('show');
            $("#deleteID").val(id);
            
        })


    }

</script>

