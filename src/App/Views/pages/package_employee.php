<?php
$lang = $data['lang'];
$list_lang = $lang['package_list'];
$status_lang = $lang['status_display']; // Raccourci pour les statuts

// --- Helper pour générer les liens de tri ---
$sortLink = function($column, $label) use ($data, $list_lang) {
    $currentSort = $data['filters']['sort'];
    $currentDir = $data['filters']['dir'];

    $newDir = ($currentSort === $column && $currentDir === 'ASC') ? 'DESC' : 'ASC';

    // Icone visuelle
    $icon = '';
    if ($currentSort === $column) {
        $icon = $currentDir === 'ASC' ? ' ▲' : ' ▼';
    }

    $url = "?q=" . urlencode($data['filters']['q']) . "&sort=$column&dir=$newDir";
    // Le label est déjà traduit dans la boucle d'appel (voir plus bas)
    return "<a href='$url' class='sort-link'>$label $icon</a>";
};


// --- NOUVEAU HELPER POUR L'AFFICHAGE DÉTAILLÉ (Modifié pour utiliser la nouvelle clé $status_lang) ---
$renderDetailedStatus = function(string $statusKey, array $data) use ($status_lang): string {
    $statusClass = '';
    $statusDisplay = htmlspecialchars($statusKey);

    // Mappage des statuts ITEM_STATUS (Postgres) vers les classes CSS brutes et l'affichage
    switch ($statusKey) {
        case 'in_storage':
            $statusClass = 'in_storage';
            $statusDisplay = $status_lang["in_storage"] ?? 'En Stock';
            break;
        case 'outbound':
            $statusClass = 'outbound';
            $statusDisplay = $status_lang["outbound"] ?? 'En cours de livraison';
            break;
        case 'delivered':
            $statusClass = 'delivered';
            $statusDisplay = $status_lang["delivered"] ?? 'Livré';
            break;
        case 'picked_up':
            $statusClass = 'picked_up';
            $statusDisplay = $status_lang["picked_up"] ?? 'Retiré';
            break;
        case 'cancelled':
            $statusClass = 'cancelled';
            $statusDisplay = $status_lang["cancelled"] ?? 'Annulé';
            break;
        default:
            $statusClass = 'unknown';
            $statusDisplay = $status_lang["unknown"] ?? 'Inconnu';
            break;
    }

    // On retourne le span HTML pour la page de détails (qui utilise la classe 'status' de base)
    return "<span class=\"status {$statusClass}\">{$statusDisplay}</span>";
};

// Fonction utilitaire pour formater les dates (accepte NULL)
$formatDate = function(?string $dateString): string {
    if (empty($dateString)) {
        return 'N/A';
    }
    // Formate la date au format jour/mois/année heure:minute
    return date('d/m/Y H:i', strtotime($dateString));
};
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/package_employee.css') ?>">
    <title><?= htmlspecialchars($data['page_title'] ?? $list_lang['page_title']) ?></title>
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="container">
    <h1><?= htmlspecialchars($data['page_title'] ?? $list_lang['page_title']) ?></h1>

    <div class="toolbar">
        <form method="GET" action="/package_list" class="search-form">
            <input type="text" name="q"
                   placeholder="<?= $list_lang['search_placeholder'] ?>"
                   value="<?= htmlspecialchars($data['filters']['q'] ?? '') ?>">

            <input type="hidden" name="sort" value="<?= $data['filters']['sort'] ?>">
            <input type="hidden" name="dir" value="<?= $data['filters']['dir'] ?>">

            <button type="submit" class="btn-search"><?= $list_lang['search_button'] ?></button>
            <?php if(!empty($data['filters']['q'])): ?>
                <a href="/package_list" style="margin-left: 10px; color: #666;"><?= $list_lang['reset_button'] ?></a>
            <?php endif; ?>
        </form>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $sortLink('package.package_code', $list_lang['table_header']['code']) ?></th>
                <th><?= $list_lang['table_header']['infos'] ?></th>
                <th><?= $sortLink('item.item_weight', $list_lang['table_header']['weight']) ?></th>
                <th><?= $list_lang['table_header']['location'] ?></th>
                <th><?= $sortLink('address.city', $list_lang['table_header']['destination']) ?></th>
                <th><?= $sortLink('item.item_status', $list_lang['table_header']['status']) ?></th>
                <th><?= $sortLink('item.item_entry_time', $list_lang['table_header']['entry']) ?></th>
                <th><?= $sortLink('item.item_exit_time', $list_lang['table_header']['exit']) ?></th>
                <th><?= $sortLink('item.item_estimated_delivery', $list_lang['table_header']['estimated_delivery']) ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($data['packages'])): ?>
                <tr>
                    <td colspan="9" style="text-align:center; padding: 20px;">
                        <?= $list_lang['no_packages_found'] ?>
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($data['packages'] as $pkg): ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($pkg['package_code']) ?></strong>
                        </td>
                        <td>
                            <?php if ($pkg['package_fragile']): ?>
                                <span class="badge badge-warning" title="Fragile"><?= $list_lang['info_fragile'] ?></span>
                            <?php endif; ?>
                            <?php if ($pkg['package_refrigerated']): ?>
                                <span class="badge badge-info" title="Réfrigéré"><?= $list_lang['info_refrigerated'] ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?= number_format($pkg['item_weight'], 2) ?> kg</td>
                        <td>
                            <?php if ($pkg['space_code']): ?>
                                <span class="badge badge-success">
                                        <?= htmlspecialchars($pkg['space_code']) ?>
                                        (Zone <?= htmlspecialchars($pkg['zone_name']) ?>)
                                    </span>
                            <?php else: ?>
                                <span class="badge badge-danger"><?= $list_lang['location_not_stored'] ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php
                            // Utilisation des clés nues (city, postal_code) pour récupérer les données.
                            $city = htmlspecialchars($pkg['city'] ?? '');
                            $postalCode = htmlspecialchars($pkg['postal_code'] ?? '');

                            if ($city && $postalCode): ?>
                                <strong><?= $city ?></strong> (<?= $postalCode ?>)
                            <?php else: ?>
                                <span style="color: #999;"><?= $list_lang['destination_na'] ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?= $renderDetailedStatus($pkg['item_status'] ?? 'unknown', $data) ?>
                        </td>
                        <td>
                            <?= $formatDate($pkg['item_entry_time']) ?>
                        </td>
                        <td>
                            <?= $formatDate($pkg['item_exit_time']) ?>
                        </td>
                        <td>
                            <?= $formatDate($pkg['item_estimated_delivery']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>


    <?php if (!empty($data['pagination']) && $data['pagination']['totalPages'] > 1): ?>
        <div class="pagination-container">
            <nav>
                <ul class="pagination">
                    <?php
                    $currentPage = $data['pagination']['currentPage'];
                    $totalPages = $data['pagination']['totalPages'];
                    $baseQuery = "?q=" . urlencode($data['filters']['q']) . "&sort=" . $data['filters']['sort'] . "&dir=" . $data['filters']['dir'];

                    // 1. Lien "Précédent"
                    if ($currentPage > 1): ?>
                        <li><a href="/package_list<?= $baseQuery ?>&page=<?= $currentPage - 1 ?>">« <?= $list_lang['pagination_prev'] ?></a></li>
                    <?php endif;

                    // 2. Liens Numériques (Afficher quelques pages autour de la page courante)
                    $range = 2;
                    $startPage = max(1, $currentPage - $range);
                    $endPage = min($totalPages, $currentPage + $range);

                    // Afficher le lien vers la première page si elle n'est pas dans la plage
                    if ($startPage > 1) {
                        ?>
                        <li><a href="/package_list<?= $baseQuery ?>&page=1">1</a></li>
                        <?php if ($startPage > 2): ?>
                            <li class="disabled"><span>...</span></li>
                        <?php endif;
                    }

                    for ($i = $startPage; $i <= $endPage; $i++):
                        $activeClass = ($i == $currentPage) ? ' active' : ''; ?>
                        <li class="<?= $activeClass ?>"><a href="/package_list<?= $baseQuery ?>&page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor;

                    // Afficher '...' et le lien vers la dernière page si elle n'est pas dans la plage
                    if ($endPage < $totalPages):
                        if ($endPage < $totalPages - 1): ?>
                            <li class="disabled"><span>...</span></li>
                        <?php endif; ?>
                        <li><a href="/package_list<?= $baseQuery ?>&page=<?= $totalPages ?>"><?= $totalPages ?></a></li>
                    <?php endif;

                    // 3. Lien "Suivant"
                    if ($currentPage < $totalPages): ?>
                        <li><a href="/package_list<?= $baseQuery ?>&page=<?= $currentPage + 1 ?>"><?= $list_lang['pagination_next'] ?> »</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <p class="summary"><?= $list_lang['pagination_summary_prefix'] ?> <?= $currentPage ?> <?= $list_lang['pagination_summary_middle'] ?> <?= $totalPages ?> <?= $list_lang['pagination_summary_suffix'] ?> <?= $data['pagination']['total'] ?>)</p>
        </div>
    <?php endif; ?>
</main>

<?= view("partial/footer", $data) ?>
</body>
</html>