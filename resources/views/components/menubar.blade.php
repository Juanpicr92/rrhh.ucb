<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="../../html/dashboards/dashboard.html">
                <span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">

        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">
            <li>
                <a href="{{ route('persona.index') }}" >
                    <div class="gui-icon"><i class="md md-people"></i></div>
                    <span class="title">Personas</span>
                </a>
            </li><!--end /menu-li -->
            <li>
                <a href="{{ route('importExport') }}" >
                    <div class="gui-icon"><i class="md md-file-upload"></i></div>
                    <span class="title">Importar Excel</span>
                </a>
            </li><!--end /menu-li -->
        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
<!-- END MENUBAR -->