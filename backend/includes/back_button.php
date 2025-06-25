<?php
// Optional: set $backUrl variable before including this file to override default back behavior
$backUrl = isset($backUrl) ? $backUrl : null;
?>
<style>
    #backButton {
        background-color: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        width: 40px;
        height: 40px;
        cursor: pointer;
        transition: all 0.3s ease;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #backButton:hover {
        background-color: rgba(255, 255, 255, 0.4);
        border-color: rgba(255, 255, 255, 0.8);
        color: white;
        box-shadow: 0 0 8px rgba(255, 255, 255, 0.7);
    }
</style>

<button id="backButton" class="back-button" aria-label="Voltar">
    <i class="bi bi-arrow-left" style="display: flex; justify-content: center; align-items: center; height: 100%; width: 100%;"></i>
</button>

<script>
    document.getElementById('backButton').addEventListener('click', function() {
        <?php if ($backUrl): ?>
            window.location.href = "<?php echo $backUrl; ?>";
        <?php else: ?>
            window.history.back();
        <?php endif; ?>
    });
</script>
