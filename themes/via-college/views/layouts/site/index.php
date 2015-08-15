<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container page">
    <div class="row clearfix">
        <div class="span12">
            <legend>
                Bienvenido a la Plataforma de Via-College <small>Online</small>
            </legend>
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span6">
                    <div class="thumbnail">
                        <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/home-estudiantes.png" />
                        <div class="caption">
                            <h3>
                                Estudiantes
                            </h3>
                            <p>
                                Aquí encontrarás todas las herramientas para encontrar al Mejor TU, reforzando tu Resume,  validando tus intereses , gustos y vocaciones, buscando los Majors mas competitivos , haciéndote seguimiento y tutoría en todo el proceso, y seleccionando los mejores Colleges donde optar por alcanzar tu sueño. 
                            </p>
                            <p>
                                <a class="btn btn-primary" href="http://app.via-college.com/cruge/ui/login">Entrar</a> <a class="btn" href="#">Solicitar Información</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="thumbnail">
                        <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/home-padres.png" />
                        <div class="caption">
                            <h3>
                                Padres
                            </h3>
                            <p>
                                Aquí vas a poder monitorear el proceso completo de tus hijos, interactuar con los distintos Tutores y personal administrativo de Via-College, encontrar tips de como ayudar a que tus hijos alcancen el objetivo, etc.; todo esto con un enfoque muy sencillo y completo que te ofrece nuestra plataforma on line.
                            </p>
                            <p>
                                <a class="btn btn-primary" href="http://app.via-college.com/cruge/ui/login">Entrar</a> <a class="btn" href="#">Solicitar Información</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span6">
                    <div class="thumbnail">
                        <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/home-tutores.png" />
                        <div class="caption">
                            <h3>
                                Tutores
                            </h3>
                            <p>
                                La plataforma de Via-College On Line, esta diseñada para facilitar la interacción de los diferentes Tutores que intervienen en el proceso de que el estudiante alcance su objetivo de matricularse en la Universidad de sus Sueños; tenemos tutores que se especializan en coadyuvar en la construcción y corrección de Essays
                            </p>
                            <p>
                                <a class="btn btn-primary" href="#">Entrar</a> <a class="btn" href="#">Solicitar Información</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="thumbnail">
                        <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/home-aliados.png" />
                        <div class="caption">
                            <h3>
                                Aliados
                            </h3>
                            <p>
                                Si tu compañía o firma, maneja asesoría de alumnos que quieren entrar a las mejores Universidades de USA, ponte en contacto con nosotros; pues poseemos los procesos, la tecnología y el personal calificado, para ofrecerte una Alianza muy atractiva.
                            </p>
                            <p>
                                <a class="btn btn-primary" href="http://app.via-college.com/cruge/ui/login">Entrar</a> <a class="btn" href="#">Solicitar Información</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>