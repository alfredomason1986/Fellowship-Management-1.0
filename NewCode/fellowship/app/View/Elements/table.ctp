<table class="slds-table slds-table--bordered slds-table--fixed-layout" role="grid" id="<?php echo $tableId ?>" >

    <thead>
        <tr class="slds-text-title--caps">
            <?php foreach ($tableHeaders as $headerText): ?>
                <th class="slds-is-sortable slds-text-title--caps" scope="col"><?php echo __($headerText); ?></th>
            <?php endforeach; ?>

            <?php if (AuthComponent::user()) : ?>
                <th scope="col" class="actions"><?php echo __('Actions'); ?></th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($tableItems as $item): 
                for($i = 0; $i < count($item); $i++) :
                    $rows = array("element" => explode("|", $item)) ;
                endfor;
                    foreach($rows["element"] as $row) :
                
        ?>
            <tr>
                <td class="slds-truncate">
                    <?php 
                        echo $row; 
                    ?>
                </td>
                
                <?php if (AuthComponent::user()) : ?>
                    <td class="actions">
                        <?php foreach ($actions as $action): ?>
                            <?php echo __($action); ?>
                        <?php endforeach; ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php 
        endforeach;
            endforeach; 
        ?>
    </tbody>
</table>