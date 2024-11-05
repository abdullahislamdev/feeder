<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Feeder</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form-update">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                {{-- Select Office --}}
                                <label class="form-label">Office</label>
                                <select type="text" class="form-control form-select" id="office">
                                    <option value="">Select Office</option>
                                </select>
                                {{-- Feeder Name --}}
                                <label class="form-label">Feeder Name</label>
                                <input type="text" class="form-control" id="feederName">
                                <label class="form-label">Feeder Incharge Mobile </label>
                                <input type="text" class="form-control" id="inchareMobile">
                                <label class="form-label">Area</label>
                                <textarea  class="form-control" id="area"></textarea>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close-feeder" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn-customer" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>
    // show the office dropdown list
    officeList();
     async function officeList(){
    
    let officeList = $("#office");
    let res = await axios.get('/office-list');

    res.data.forEach(function(office,index){
        let option = `<option value="${office['id']}">
                        ${office['name']}
                     </option>`
                     officeList.append(option);
    }); 
   }

//    Add feeder info
    async function Save(){
        let feederName = document.getElementById('feederName').value;
        let inchareMobile = document.getElementById('inchareMobile').value;
        let area = document.getElementById('area').value;

        if(feederName.length === 0){
            errorToast("Feeder Name Required");
        }
        if(inchareMobile.length === 0){
            errorToast("Inchare Mobile Required");
        }
        if(area.length === 0){
            errorToast("Area Required");
        }

        else{
            document.getElementById('modal-close-feeder').click();
            showLoader();
            let res = await axios.post('/create-feeder',{
                name:feederName,
                incharge_mobile:inchareMobile,
                area:area,
                office_id:$("#office").val(),
            });
            hideLoader();
            if(res.status === 200){
                successToast('Feeder added Successful');
                document.getElementById('save-form-update').reset();

                await getList();
            }

            else{
                errorToast("Request failed");
            }
        }
    }
</script>