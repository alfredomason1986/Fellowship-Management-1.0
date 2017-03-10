<div class="slds-page-header">
    <div class="slds-grid">
        <div class="slds-col slds-has-flexi-truncate">
            <div class="slds-media">
                <div class="slds-media__figure">
                </div>
                <div class="slds-media__body">
                    <span class="slds-text-heading--label"> <?php echo !!$userLink ? "Applied By: " .$userLink : $userLink ?> </span>
                    <div class="slds-grid">
                        <h1 class="slds-text-heading--medium slds-m-right--small slds-truncate slds-align-middle" style="background-color: transparent;"> 
                            <?php echo $title ?> 
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="slds-col slds-no-flex slds-align-bottom">
            <div class="slds-button-group" role="group">
                <?php echo implode($buttons) ?>
            </div>
        </div>
    </div>
</div>
