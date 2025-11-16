<?php

    namespace components\Forms;

    class Input
    {

        public static function create( array $props ) : void
        {
            $label = $props['label'] ?? null;
            $name = $props['name'] ?? '';
            $type = $props['type'] ?? 'text';
            $placeholder = $props['placeholder'] ?? '';
            $value = $props['value'] ?? '';
            $class = $props['class'] ?? 'form-control';
            $required = isset( $props['required'] ) && $props['required'] ? 'required' : '';
            ?>

            <?php FormGroup::open();
            if( $label ): ?>
                <label for="<?= $name ?>" class="form-label">
                    <?= htmlspecialchars( $label ) ?>
                </label>
            <?php endif; ?>

            <input
                    type="<?= htmlspecialchars( $type ) ?>"
                    id="<?= htmlspecialchars( $name ) ?>"
                    name="<?= htmlspecialchars( $name ) ?>"
                    class="<?= htmlspecialchars( $class ) ?>"
                    placeholder="<?= htmlspecialchars( $placeholder ) ?>"
                    value="<?= htmlspecialchars( $value ) ?>"
                    <?= $required ?>
            />
            <?php FormGroup::close();
        }
    }
