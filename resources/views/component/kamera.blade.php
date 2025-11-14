<style>
    #camera-container {
        width: 100%;
        max-width: 420px;
        margin: auto;
        position: relative;
        text-align: center;
    }

    #watermark {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color: white;
        background: rgba(0,0,0,0.5);
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 13px;
        text-align: left;
        font-weight: 600;
        line-height: 1.2;
    }
</style>

<div id="camera-container">
    <video id="camera" autoplay playsinline width="100%" style="border-radius: 10px;"></video>

    <div id="watermark">
        <div id="wm-time"></div>
        <div id="wm-date"></div>
        <div id="wm-day"></div>
        <div id="wm-location"></div>
    </div>
</div>

<br>

<button id="capture-btn" class="btn btn-primary btn-block">Ambil Foto</button>

<canvas id="snapshot" width="420" height="320" style="display:none;"></canvas>
<input type="hidden" id="foto_input" name="foto">

<script>
// ====== Kamera ======
navigator.mediaDevices.getUserMedia({ video: true })
    .then(function(stream){
        document.getElementById('camera').srcObject = stream;
    });

// ====== Ambil Foto ======
document.getElementById('capture-btn').addEventListener('click', function(){
    let video = document.getElementById('camera');
    let canvas = document.getElementById('snapshot');
    let ctx = canvas.getContext('2d');

    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Tambahkan watermark
    ctx.font = "16px Arial";
    ctx.fillStyle = "white";
    ctx.fillText(document.getElementById("watermark").innerText, 10, canvas.height - 10);

    let imageData = canvas.toDataURL("image/png");
    document.getElementById("foto_input").value = imageData;

    alert("Foto berhasil diambil!");
});

// ====== Jam, Tanggal, Hari ======
function updateDateTime(){
    let now = new Date();

    let time = now.toLocaleTimeString("id-ID", { hour: "2-digit", minute: "2-digit" });
    let date = now.toLocaleDateString("id-ID");
    let day  = now.toLocaleDateString("id-ID", { weekday: "long" });

    document.getElementById("wm-time").innerText = "⏰ " + time;
    document.getElementById("wm-date").innerText = "📅 " + date;
    document.getElementById("wm-day").innerText  = "📌 " + day;
}

setInterval(updateDateTime, 1000);
updateDateTime();

// ====== Lokasi ======
if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(function(pos){
        let lat = pos.coords.latitude;
        let lon = pos.coords.longitude;

        document.getElementById("wm-location").innerText =
            "📍 (" + lat.toFixed(5) + ", " + lon.toFixed(5) + ")";
    });
}
</script>
