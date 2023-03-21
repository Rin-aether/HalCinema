//appをindex.jsで使いたいのでスコープを外しています。
var app;

function Motion(number){
  app.stage.children[0].internalModel.motionManager.startMotion('TapBody',number,2);
}

// PixiJS
var {
  Application,
  live2d: { Live2DModel },
} = PIXI;

// Kalidokit
var {
  Face,
  Vector: { lerp },
  Utils: { clamp },
} = Kalidokit;

// 1, Live2Dモデルへのパスを指定する
var modelUrl = "./Live2dModels/haru_greeter_pro_jp/runtime/haru_greeter_t03.model3.json";
var currentModel;

// メインの処理開始
(async function main() {
  // 2, PixiJSを準備する
  app = new PIXI.Application({
    view: document.getElementById("my-live2d"),
    transparent: true,
    autoStart: true,
    backgroundAlpha: 0,
    resizeTo: window,
  });

  // 3, Live2Dモデルをロードする
  currentModel = await Live2DModel.from(modelUrl, { autoInteract: false });
  currentModel.scale.set(0.3); //モデルの大きさ★
  currentModel.interactive = true;
  currentModel.anchor.set(0.5, 0.5); //モデルのアンカー★
  currentModel.position.set(window.innerWidth / 2, window.innerHeight); //モデルの位置★

  // 6, Live2Dモデルを配置する
  app.stage.addChild(currentModel);
})();
