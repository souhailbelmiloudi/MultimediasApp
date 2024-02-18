

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h1 class="text-center mb-4">Formulario Editar</h1>
           
            <form method="POST" action="" class="needs-validation" novalidate>

                <div class="row g-3">
                 
                    <?php foreach ($props as $prop): ?>
                    <?php $prop->setAccessible(true); ?>
                        <div class="col-md-6 mb-3">
                            <?php if ($prop->getName() == 'id'): ?>
                            <label for="<?php echo $prop->getName(); ?>" class="form-label text-capitalize   p-3"><?php echo $prop->getName(); ?></label>
                            <input type="number" class="form-control" id="<?php echo $prop->getName(); ?>" name="<?php echo $prop->getName(); ?>" value="<?php echo $prop->getValue($objeto); ?>" required readonly>
                            <?php else : ?>
                            <label for="<?php echo $prop->getName(); ?>" class="form-label text-capitalize   p-3"><?php echo $prop->getName(); ?></label>
                            <input type="text" class="form-control" id="<?php echo $prop->getName(); ?>" name="<?php echo $prop->getName(); ?>" value="<?php echo $prop->getValue($objeto); ?>" required>
                            <?php endif ?>
                        </div>
                    <?php endforeach ?>
                </div>   

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary" name="modificar">Modificar</button>
                    <button type="submit" name="modificar" class="btn btn-secondary" >Cancelar</button>
                   
                </div>
            </form>
        </div>
    </div>
</div>
