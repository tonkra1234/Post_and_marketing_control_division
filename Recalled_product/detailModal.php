<!-- Modal -->
<div class="offcanvas offcanvas-start" id="detailModal<?php echo $result['id'];?>" tabindex="-1"
    aria-labelledby="offcanvasExampleLabel" aria-hidden="true">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Detail of each Recalled product</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body bg-light">
        <div class="row">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-dna"></i> <span class="fs-6 fw-bold">id
                    :
                </span><span><?php echo $result['id']?></span>
            </div>
            <hr class="mb-2">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-dna"></i> <span class="fs-6 fw-bold">Generic name
                    :
                </span><span><?php echo $result['Generic_name']?>
            </div>
            <hr class="mb-2">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-copyright"></i> <span class="fs-6 fw-bold">Brand_name :
                </span><span><?php echo $result['Brand_name'];?></span>
            </div>
            <hr class="mb-2">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-hashtag"></i> <span class="fs-6 fw-bold">Batch No
                    :
                </span><span><?php echo $result['Batch_No']?></span>
            </div>
            <hr class="mb-2">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-industry"></i> <span class="fs-6 fw-bold">Manufacturer :
                </span><span><?php echo $result['Manufacturer']?></span>
            </div>
            <hr class="mb-2">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-registered"></i><span class="fs-6 fw-bold">Mode of
                    registration :
                </span><span><?php echo $result['Mode_of_registration']?></span>
            </div>
            <hr class="mb-2">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-capsules"></i> <span class="fs-6 fw-bold">Class of medicines
                    :
                </span><span><?php echo $result['Class_of_medicines']?></span>
            </div>
            <hr class="mb-2">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-clock-rotate-left"></i> <span class="fs-6 fw-bold">Class of recall
                    :
                </span><span><?php echo $result['Class_of_recall']?></span>
            </div>
            <hr class="mb-2">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-layer-group"></i> <span class="fs-6 fw-bold">Level of Recall :
                </span><span><?php echo $result['Level_of_Recall']?></span>
            </div>
            <hr class="mb-2">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-info"></i> <span class="fs-6 fw-bold">Reason for recall :
                </span><span><?php echo $result['Reason_for_recall']?></span>
            </div>
            <hr class="mb-2">
            <div class="col-12 mt-auto mb-2">
                <i class="fa-solid fa-calendar-days"></i> <span class="fs-6 fw-bold">Date of recall :
                </span><span><?php echo $result['Date_of_recall']?></span>
            </div>
            <hr class="mb-2">
        </div>
    </div>
</div>