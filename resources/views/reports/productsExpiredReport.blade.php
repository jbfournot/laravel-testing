<h1>Nos fournisseurs</h1>
<ul>
    @foreach($suppliers as $supplier)
        <li>{{ $supplier->name }}</li>
    @endforeach
</ul>

<h1>Nos produits</h1>
<ul>
    @foreach($products as $product)
        <li>{{ $product->name }}</li>
    @endforeach
</ul>

{{--

    Pour le rapport des produits expirés par fournisseur, le client souhaite avoir ce design

    FOURNISSEUR 1: LISTE DES PRODUITS EXPIRÉS
    - Nom du produit 1: quantité, date d'expiration
    - Nom du produit 2: quantité, date d'expiration
    - Nom du produit 3: quantité, date d'expiration

    FOURNISSEUR 2: LISTE DES PRODUITS EXPIRÉS
    - Nom du produit 1: quantité, date d'expiration
    - Nom du produit 2: quantité, date d'expiration
    - Nom du produit 3: quantité, date d'expiration
    
--}}