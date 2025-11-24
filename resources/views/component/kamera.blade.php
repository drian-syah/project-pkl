<style>
    #camera-container {
        width: 100%;
        max-width: 420px;
        margin: auto;
        position: relative;
        text-align: center;
    }
    #preview {
        width: 100%;
        max-width: 420px;
        border-radius: 10px;
        margin-top: 15px;
        display: none;
    }

    .btn-small {
        padding: 6px 12px;
        font-size: 14px;
        margin-top: 10px;
    }
</style>

<div id="camera-container">
    <video id="camera" autoplay playsinline width="100%" style="border-radius: 10px;"></video>
    <button id="capture-btn" class="btn btn-primary btn-small btn-block" style="margin-top:10px;">
        Ambil Foto
    </button>
</div>
<canvas id="snapshot" width="420" height="320" style="display:none;"></canvas>
<input type="hidden" id="foto_input" name="foto">
<img id="preview" alt="Hasil Foto">
<div id="after-buttons" style="display:none;">
    <button id="cancel-btn" class="btn btn-danger btn-small">Batalkan / Ambil Ulang</button>
</div>


<script>
let camera = document.getElementById('camera');
let preview = document.getElementById('preview');
let afterButtons = document.getElementById('after-buttons');
let captureBtn = document.getElementById('capture-btn');
let mediaStream = null;
function startCamera() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            mediaStream = stream;
            camera.srcObject = stream;
        })
        .catch(err => {
            alert("Gagal akses kamera!");
            console.error(err);
        });
}

startCamera();

captureBtn.addEventListener('click', function () {
    let canvas = document.getElementById('snapshot');
    let ctx = canvas.getContext('2d');

    ctx.drawImage(camera, 0, 0, canvas.width, canvas.height);

    let imageData = canvas.toDataURL("image/jpeg", 0.9);

    document.getElementById("foto_input").value = imageData;

    preview.src = imageData;
    preview.style.display = "block";

    camera.style.display = "none";
    captureBtn.style.display = "none";

    afterButtons.style.display = "block";

    if (mediaStream) {
        mediaStream.getTracks().forEach(track => track.stop());
    }
});
document.getElementById("cancel-btn").addEventListener("click", function () {
    preview.style.display = "none";
    preview.src = "";

    document.getElementById("foto_input").value = "";

    camera.style.display = "block";
    captureBtn.style.display = "block";

    afterButtons.style.display = "none";

    startCamera();
});
</script>
