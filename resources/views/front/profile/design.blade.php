@extends('front.layouts.app')
@section("content")
@push("css")

<style>
  .box-info {
    display: flex;
    align-items: flex-start;
    margin-top: 40px;
  }

  .box-info .left {
    width: 827px;
    position: relative;
    height: 620px;
    background: #f3f3f3;
    border-radius: 20px;
    overflow: hidden;
  }

  .info-name {
    color: #333;
    font-family: Gilroy;
    font-size: 32px;
    margin: 30px 0;
    height: 48px;
    font-weight: 500;
  }

  .box-info-slider {
    position: relative;
    overflow: visible;
    width: 100%;
    height: 100%;
    transition: transform 0.5s ease-in-out;
  }

  .box-info .box-info-item {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    /* opacity: 0; */
  }

  .box-info-item .d3,
  .dieline,
  .preview {
    width: 100%;
    height: 100%;
  }

  .box-info .box-info-item:nth-of-type(1) {
    transform: translateX(0);
  }

  .box-info .box-info-item:nth-of-type(2) {
    transform: translatex(100%);
  }

  .box-info .box-info-item:nth-of-type(3) {
    transform: translatex(200%);
  }

  .left .d3-and-d2-switch {
    display: inline-block;
    width: 184px;
    height: 36px;
    line-height: 36px;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 24px;
    margin: auto;
    padding: 3px;
    background-color: #fff;
    border-radius: 32px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    column-gap: 3px;
    align-items: center;
  }

  .d3-and-d2-switch .switch-item {
    height: 30px;
    line-height: 30px;
    border-radius: 30px;
    text-align: center;
    cursor: pointer;
    background: #f0f0f0;
    color: #4c4c4c;
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
  }

  .d3-and-d2-switch .switch-item.active {
    background: #731eff;
    color: #fff;
  }

  .price-box {
    color: #333;
    font-family: Gilroy;
  }

  .price-box .price-unit {
    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    margin-right: 10px;
    color: #333;
  }

  .price-box .price-text {
    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
  }

  .price-box .price-total {
    font-size: 36px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
  }

  .box-info .right {
    height: 500px;
    padding-left: 40px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  .btn-group {
    margin-top: 60px;
    display: flex;
    align-items: center;
  }

  .btn-buy {
    background: #000;
    flex: 1;
  }

  .btn-group .design-btn {
    margin-left: 30px;
    background-origin: padding-box, border-box;
    background-clip: padding-box, border-box;
    cursor: pointer;
    color: #191919;
    border: solid 2px transparent;
    flex: 1;
    background-image: linear-gradient(to right, #fff, #fff),
      conic-gradient(#ff7a00,
        #fff500,
        #00ff85,
        #00f0ff,
        #000aff,
        #8f00ff,
        #ff005c,
        #fe0000);
  }

  .download-text {
    color: #333;
    font-family: Gilroy;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
    text-decoration-line: underline;
    margin-top: 16px;
    text-align: right;
    cursor: pointer;
  }

  .description-box {
    margin-top: 160px;
  }

  .description-box h2 {
    color: #333;
    font-family: Gilroy;
    font-size: 32px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
  }

  .description-box .description-info {
    color: #333;
    font-family: Gilroy;
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
  }

  .collapse-control {
    position: absolute;
    left: 0;
    right: 0;
    top: 24px;
    margin: auto;
    width: 210px;
    height: 28px;
    display: flex;
    align-items: center;
    box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1);
    border-radius: 28px;
    padding: 8px 12px;
    color: #191919;
    background: #fff;
    font-family: Gilroy;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: 12px;
    /* 100% */
    cursor: pointer;
    z-index: 10;
  }

  .collapse-control .slider-box {
    flex: 1;
    margin: 0 8px;
    background-color: #7f7f7f;
    height: 4px;
    border-radius: 4px;
    /* overflow: hidden; */
    position: relative;
  }

  .slider-box .slider-selecter {
    height: 4px;
    background: #000;
    width: 100%;
    display: inline-block;
    border-radius: 4px;
    position: absolute;
    left: 0;
  }

  .slider-box .pointer {
    position: absolute;
    left: 100%;
    transform: translateX(-6px);
    top: -4px;
    width: 12px;
    height: 12px;
    display: inline-block;
    border-radius: 6px;
    border: 1px solid #d1d0d2;
    background: #fff;
    box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.2);
    cursor: pointer;
  }

  .toast-message {
    display: inline-block;
    max-width: 350px;
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    margin: auto;
    background: #fff;
    box-shadow: 0 0 8px #f2f2f2;
    border-radius: 12px;
    font-size: 16px;
    padding: 10px;
    opacity: 0;
    pointer-events: none;
    transform: translateY(0);
    color: #7f7f7f;
    transition: transform 0.5s ease-in-out, opacity 0.3s;
    z-index: 100;
  }

  .toast-message.active {
    opacity: 1;
    transform: translateY(60px);
  }

  .crop-parent {
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    margin: auto;
  }
</style>
@endpush

<div class="pt-28 container">
  <div class="crumb-box" data-position="bottom">
    <a class="crumb-item">All products</a>
    /<a class="crumb-item">Folding Box</a>
    /Custom dimensions flip top boxes mailer
  </div>
  <div class="info-name" data-pacdora-ui="info-name"></div>
  <div class="box-info">
    <div class="left">
      <div class="box-info-slider">
        <div class="box-info-item active">
          <!-- 3D box expansion and collapse control component start -->
          <div class="collapse-control" data-position="bottom">
            <div onclick="openPacdora(0)">Open</div>
            <div class="slider-box">
              <div class="slider-selecter"></div>
              <div class="pointer" onpointerdown="onSliderDown(this)"></div>
            </div>
            <div onclick="openPacdora(1)">Close</div>
          </div>
          <!-- 3D box expansion and collapse control component end -->

          <!-- Pacdora component data-pacdora-ui="3d" start -->
          <div class="d3" data-pacdora-ui="3d" data-pacdora-id="d3" data-init-rotation="true"></div>
          <!-- Pacdora component data-pacdora-ui="3d" end -->
        </div>
        <!-- Pacdora component data-pacdora-ui="dieline" start -->
        <div class="box-info-item" data-tip-position="center">
          <div class="dieline" data-pacdora-ui="dieline"></div>
        </div>
        <!-- Pacdora component data-pacdora-ui="dieline" end -->

        <!-- Pacdora-component data-pacdora-ui="3d-preview" start -->
        <div class="box-info-item" data-tip-position="center">
          <div data-pacdora-ui="3d-preview" class="preview"></div>
        </div>
        <!-- Pacdora-component data-pacdora-ui="3d-preview" end -->
      </div>

      <!-- Slide Switch Component -->
      <div class="d3-and-d2-switch">
        <div class="switch-item active" onclick="onSwitch2DAnd3D('3d')">
          3D
        </div>
        <div class="switch-item" onclick="onSwitch2DAnd3D('dieline')">
          Dieline
        </div>
        <div class="switch-item" onclick="onSwitch2DAnd3D('2d')">
          2D
        </div>
      </div>
      <!-- Slide Switch Component end -->
      <div class="pac-loading crop-parent"></div>
    </div>
    <div class="right">
      <div class="sub-title">Dimension</div>
      <div class="selector-box">
        <select onchange="onChangeDimension(this)" id="dimension">
          <option value="">Choose the dimension</option>
          <option value="315*202*62">315*202*62mm</option>
          <option value="150*100*50">150*100*50mm</option>
          <option value="360*240*40">360*240*40mm</option>
          <option value="customize">Customize</option>
        </select>
      </div>
      <div class="sub-title mt30">Material</div>
      <div class="selector-box">
        <select onchange="onChangeMaterial(this)" id="material">
          <option value="">Choose the material</option>
          <option value="White card board">White card board</option>
          <option value="E-flute paper">E-flute paper</option>
          <option value="Kraft paper">Dark kraft paper</option>
        </select>
      </div>
      <div class="sub-title mt30">
        Thickness
      </div>
      <div class="selector-box">
        <select onchange="onChangeThickness(this)" id="thickness">
          <option value="">Choose the thickness</option>
          <option value="1.5">1.5mm</option>
          <option value="1">1mm</option>
          <option value="2">2mm</option>
        </select>
      </div>

      <div class="flex-between" id="quotation-selects">
        <div class="flex1">
          <div class="sub-title mt30">Print</div>
          <div class="selector-box">
            <select onchange="onChangePrint(this)" id="print">
              <option value="">Choose the print method</option>
              <option value="blank">Blank</option>
              <option value="outside" selected="selected">
                Outside
              </option>
              <option value="inside">Inside</option>
              <option value="both">Both Sides</option>
            </select>
          </div>
        </div>

        <div class="flex1 ml20">
          <div class="sub-title mt30">Finishing</div>
          <div class="selector-box">
            <select onchange="onChangeFinishing(this)" id="finishing">
              <option value="">Choose the Finishing</option>
              <option value="blank">Blank</option>
              <option value="gloss" selected="selected">Gloss</option>
              <option value="matte">Matte</option>
            </select>
          </div>
        </div>
      </div>

      <div class="flex-between flex-end">
        <!-- <div class="ml-auto number-box">
                  <div class="number-control" onclick="onStep(-1)">-</div>
                  <div id="count">1</div>
                  <div class="number-control" onclick="onStep(1)">+</div>
                </div> -->

        <div>
          <div class="sub-title mt30">Quantity</div>
          <div class="selector-box">
            <select onchange="onChangeNumber(this)" id="number">
              <option value="500" selected="selected">500</option>
              <option value="1000">1000</option>
              <option value="2000">2000</option>
              <option value="customize">Customize</option>
            </select>
          </div>
        </div>


      </div>
      <div class="btn-group">
        <!-- <div class="btn btn-buy" onclick="onBuyClick()">
                  <div class="pac-loading small white"></div>
                  Buy
                </div> -->
        <div class="btn design-btn" data-pacdora-ui="design-btn" data-save-screenshot="true" data-screenshot-width="800">
          <div class="pac-loading small"></div>
          Design online {{Auth::user()->id}}
        </div>
      </div>
      <div class="download-text" data-pacdora-ui="download" data-app-key="a3e831ccfa3ffd84" data-pacdora-id="download">
        Download the Dieline
      </div>
    </div>
  </div>
  <div class="description-box">
    <h2>Deskripsi products</h2>
    <div class="description-info mt30" data-pacdora-ui="info-description"></div>

  </div>
</div>

<script src="{{asset('js/quotation.js')}}"></script>
<script src="{{asset('js/tips.js')}}"></script>
<script src="https://cdn.pacdora.com/Pacdora-v1.1.1.js"></script>
<script src="{{asset('js/base.js')}}"></script>
<script src="{{asset('js/detail.js')}}"></script>
@push('js')
<script>
  console.log("{{Auth::user()->id}}")
  setTimeout(async () => {
    await Pacdora.init({
      userId: "10",
      appId: "71ee73045e3480fe",
      isDelay: true,
    });
  }, 1000);
</script>
@endpush
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  (async () => {
    // const userId = localStorage.getItem("username");
    // let externalId = localStorage.getItem("externalId");
    // if (!externalId) {
    //   externalId = Math.random().toFixed(16).substring(1).toString(16);
    //   localStorage.setItem("externalId", externalId);
    // }

    await Pacdora.init({
      userId: "10",
      appId: "71ee73045e3480fe",
      isDelay: true,
      theme: "#dc2626",
      doneBtn: "Save",
      localeResource: {
        "Upload & Design": "Online design",
      },
    });

  
  
    await Pacdora.createScene({
      id : "{{$id}}",
      isShowLoading: false,
      doneBtn: "Save",
    });

    
    Pacdora.$on("download:start", () => {
      const downloadEle = document.querySelector(".download-text");
      downloadEle.innerText = "Downloading...";
    });
    Pacdora.$on("download:success", () => {
      const downloadEle = document.querySelector(".download-text");
      downloadEle.innerText = "Download success";
      setTimeout(() => {
        downloadEle.innerText = "Download the Dieline";
      }, 1000);
    });
    Pacdora.$on("download:fail", () => {
      const downloadEle = document.querySelector(".download-text");
      downloadEle.innerText = "Download failed";
      setTimeout(() => {
        downloadEle.innerText = "Download the Dieline";
      }, 1000);
    });

    Pacdora.$on("design:opened", () => {

      //ajax post to histrory controller


      const sizeBox = document.querySelector(".size-box");
      sizeBox.dataset.uiTip = "editor-size";
      sizeBox.dataset.position = "right";
      const materialBox = document.querySelector(".pacdora-material-box");
      materialBox.dataset.uiTip = "editor-material";
      materialBox.dataset.position = "right";
      const recommendBox = document.querySelector(".recommend-color-root");
      recommendBox.dataset.uiTip = "editor-recommend";
      recommendBox.dataset.position = "right";
      const saveBtn = document.querySelector(".save-btn");
      saveBtn.dataset.uiTip = "editor-save";
      const watermark = document.querySelector(".pacdora-watermark");
      watermark.dataset.uiTip = "editor-white-label";
      const designHeader = document.querySelector(".design-body");
      designHeader.dataset.uiTip = "locale";
      designHeader.dataset.position = "bottom";
      const tipEles = [
        sizeBox,
        materialBox,
        recommendBox,
        saveBtn,
        watermark,
        designHeader,
      ];
      for (let i = 0; i < tipEles.length; i++) {
        const ele = tipEles[i];
        const style = getComputedStyle(ele);
        if (style.position !== "absolute" && style.position !== "fixed") {
          ele.style.position = "relative";
        }
        const tipUIEle = document.createElement("div");
        tipUIEle.className = "api-tip";
        tipUIEle.style.left = "-20px";
        tipUIEle.style.top = "0px";
        const tipInner = document.createElement("div");
        tipInner.className = "api-tip-inner";
        tipUIEle.appendChild(tipInner);
        ele.appendChild(tipUIEle);
        if (ele === designHeader) {
          tipUIEle.style.left = "10px";
          tipUIEle.style.top = "-24px";
          tipUIEle.style.zIndex = 9999;
        }
        tipUIEle.onclick = (e) => {
          e.stopPropagation();
          showApiTip(ele.dataset.uiTip);
        };
        tipUIEle.onmouseenter = (e) => {
          e.stopPropagation();
          e.preventDefault();
          showApiToast(tipUIEle, ele.dataset.uiTip, true);
        };
        tipUIEle.onmouseleave = (e) => {
          showApiToast(tipUIEle, ele.dataset.uiTip, false);
        };
      }

    });
    Pacdora.$on('design:save', async ()=> {
      const data =  await Pacdora.getBoxInfo();
      // send requst useing ajak
      $.ajax({
        type: "POST",
        url: "{{route('history.store')}}",
        data: {
          _token: "{{ csrf_token() }}",
          image_file: data.screenshot,
          user_id: "{{Auth::user()->id}}",
          model_id: modelId,
        },
        success: function(response) {
          console.log(response);
        }
      });
    }
    )
    // Retrieve the box information of the created project and initialize the GUI
    const info = await Pacdora.getBoxInfo();
    // input image for info.screenshoot
    

    const dimensionEle = document.getElementById("dimension");
    if (dimensionEle) {
      const optionEles = dimensionEle.querySelectorAll("option");
      let hasEle = false;
      const txt = `${info.length}*${info.width}*${info.height}mm`;
      for (let i = 0; i < optionEles.length; i++) {
        if (optionEles[i].innerText === txt) {
          hasEle = true;
        }
      }
      if (!hasEle) {
        const ele = document.createElement("option");
        ele.innerHTML = txt;
        ele.value = `${info.length}*${info.width}*${info.height}`;
        dimensionEle.add(ele, dimensionEle.options[1]);
      }
      dimensionEle.value = `${info.length}*${info.width}*${info.height}`;
    }
    const materialEle = document.getElementById("material");
    if (materialEle) {
      const optionEles = materialEle.querySelectorAll("option");
      let hasEle = false;
      const txt = info.materialName;
      for (let i = 0; i < optionEles.length; i++) {
        if (optionEles[i].innerText === txt) {
          hasEle = true;
        }
      }
      if (!hasEle) {
        const ele = document.createElement("option");
        ele.innerHTML = txt;
        ele.value = txt;
        materialEle.appendChild(ele);
      }
      materialEle.value = info.materialName;
    }
    const thicknessEle = document.getElementById("thickness");
    if (thicknessEle) {
      const optionEles = thicknessEle.querySelectorAll("option");
      let hasEle = false;
      const txt = `${info.thickness}`;
      for (let i = 0; i < optionEles.length; i++) {
        if (optionEles[i].innerText === txt) {
          hasEle = true;
        }
      }
      if (!hasEle) {
        const ele = document.createElement("option");
        ele.innerHTML = txt + "mm";
        ele.value = txt + "";
        thicknessEle.appendChild(ele);
      }
      thicknessEle.value = `${info.thickness}`;
    }

    // Initialization complete, remove loading animation
    const loadings = document.querySelectorAll(".pac-loading");
    for (let i = 0; i < loadings.length; i++) {
      const loadingEle = loadings[i];
      loadingEle.parentNode?.removeChild(loadingEle);
    }

    makeQuotation();
  })();
</script>
<script>
  
</script>
@endsection