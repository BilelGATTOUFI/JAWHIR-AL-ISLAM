<!-- start: WIZARD DEMO -->
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15"><?=$data["title"]?></h5>

            <!-- start: WIZARD FORM -->
            <form action="ajax.php" method="post" role="form" class="smart-wizard smartWizardForm">
                <div class="smartWizard swMain">
                    <!-- start: WIZARD SEPS -->
                    <ul>
                        <li>
                            <a href="#step-1">
                                <div class="stepNumber">
                                    1
                                </div>
                                <span class="stepDesc"><small> Personal Information </small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <div class="stepNumber">
                                    2
                                </div>
                                <span class="stepDesc"> <small> Create an account </small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3">
                                <div class="stepNumber">
                                    3
                                </div>
                                <span class="stepDesc"> <small> Billing details </small> </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-4">
                                <div class="stepNumber">
                                    4
                                </div>
                                <span class="stepDesc"> <small> Complete </small> </span>
                            </a>
                        </li>
                    </ul>
                    <!-- end: WIZARD SEPS -->
                    <div id="step-1">
                    </div>
                    <div id="step-2">
                    </div>
                    <div id="step-3">
                    </div>
                    <div id="step-4">
                    </div>
                </div>
            </form>
            <!-- end: WIZARD FORM -->
        </div>
    </div>
</div>
<!-- start: WIZARD DEMO -->