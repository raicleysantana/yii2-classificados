<?php
/* @var $this View */


use yii\web\View;
use yii\widgets\ListView;

$css = <<< CSS
.wrapperColor {
  display: table;
  height: 100%;
  width: 100%;
}

.container-fostrap {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.fostrap-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #505050;
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
  }
} 
.card {
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none!important;
}
/** CSS TEMPORAL **/
.wrapperButtons>.container-fostrap>.content>.container {
    padding: 10px 20px;
    margin: 0 0 20px;
    border-left: 5px solid #eee;
}
.btn-transpt-tmp,.btn-transpt-tmp:hover{
    font-size: 16px;
    color: #666;
    font-family: "dinnext-regular";
    text-align: center;
    display: inline-block;
    width: 100%;
    border: solid 1px #666;
    max-width: 170px;
    padding: 6px 20px !important;
    margin: 10px 0;
    transition: .3s;
    -webkit-transition: .3s;
    -moz-transition: .3s;
    -o-transition: .3s;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    text-decoration:none!important;
}
.btn-transpt-tmp.hover,.btn-transpt-tmp.hover:hover {
    background-color: #666;
    color: #FFF;
}
.btn-transpt-tmp.focus,.btn-transpt-tmp.focus:hover {
    background-color: #F37F42;
    color: #FFF;
}
.btn-white-tmp, .btn-white-tmp:hover {
    font-size: 16px;
    border: 1px solid #0154A0;
    background-color: #0154A0;
    color: #FFF;
    text-align: center;
    display: inline-block;
    width: 100%;
    max-width: 180px;
    padding: 6px 20px !important;
    margin: 10px 0;
    transition: .3s;
    -webkit-transition: .3s;
    -moz-transition: .3s;
    -o-transition: .3s;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    text-decoration:none!important;
}
.btn-white-tmp.hover, .btn-white-tmp.hover:hover {
    background-color: #fff!important;
    color: #0154A0!important;
}
.btn-white-tmp.focus, .btn-white-tmp.focus:hover {
    background-color: #F37F42!important;
    color: #FFF!important;
}
.btn-info-azul-tmp,.btn-info-azul-tmp:hover{
    color: #FFF;
    display: inline-block;
    width: 100%;
    max-width: 160px;
    font-size: 16px;
    font-family: "dinnext-regular";
    text-align: center;
    transition: all 0.3s ease 0s;
    border-radius: 5px;
    background-color: #0154A0;
    border:1px solid #0154A0;;
    top: 290px;
    left: 30px;
    padding: 0.6em !important;
    text-decoration:none!important;
}
.btn-info-azul-tmp.hover,.btn-info-azul-tmp.hover:hover{
    background-color: #fff;
    color: #0154A0;
}
.btn-info-azul-tmp.focus,.btn-info-azul-tmp.focus:hover{
    background-color: #F37F42;
    color: #FFF;
}
.btn-info-naranja-tmp,.btn-info-naranja-tmp:hover{
    font-size: 16px;
    color: #FFF;
    font-family: "dinnext-regular";
    text-align: center;
    display: inline-block;
    width: 100%;
    background-color: #FF6702;
    border: solid 1px #FF6702;
    max-width: 170px;
    padding: 6px 20px !important;
    margin: 10px 0;
    transition: .3s;
    -webkit-transition: .3s;
    -moz-transition: .3s;
    -o-transition: .3s;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    text-decoration:none;
}
.btn-info-naranja-tmp.hover,.btn-info-naranja-tmp.hover:hover{
    background-color: #FFF;
    border: solid 1px #FF6601;
    color: #FF6601;
}
.btn-info-naranja-tmp.focus,.btn-info-naranja-tmp.focus:hover{
    background-color: #F37F42;
    color: #FFF;
}
CSS;

$this->registerCss($css, ['position' => View::POS_HEAD]);

$this->title = "Cursos Recomendados";

?>

<div class="container">
    <div class="row">
        <section class="wrapperColor">
            <div class="container-fostrap">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <?php
                            echo ListView::widget([
                                'dataProvider' => $dataProvider,
                                'itemView' => function ($model, $view, $index, $widget) {
                                    return $this->render('_cursos', ['model' => $model]);
                                }
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
