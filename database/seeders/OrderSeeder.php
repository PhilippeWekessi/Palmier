<?php

namespace Database\Seeders;

use App\Models\DeliveryZone;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        if ($products->isEmpty()) {
            return;
        }

        $zones = DeliveryZone::all();
        $zoneCotonou = $zones->firstWhere('name', 'Cotonou') ?? $zones->first();
        $zoneCalavi = $zones->firstWhere('name', 'Abomey-Calavi') ?? $zones->first();
        $zonePorto = $zones->firstWhere('name', 'Porto-Novo') ?? $zones->first();

        // Clients de démonstration
        $client1 = User::firstOrCreate(
            ['email' => 'client.demo1@elaeis-prestige.test'],
            [
                'name' => 'Koffi Mensah (démo)',
                'phone' => '+22997000001',
                'password' => bcrypt('Client1234@'),
                'role' => User::ROLE_CLIENT,
                'email_verified_at' => now(),
            ]
        );

        $client2 = User::firstOrCreate(
            ['email' => 'client.demo2@elaeis-prestige.test'],
            [
                'name' => 'Adjovi Hounkpati (démo)',
                'phone' => '+22996000002',
                'password' => bcrypt('Client1234@'),
                'role' => User::ROLE_CLIENT,
                'email_verified_at' => now(),
            ]
        );

        $ordersData = [
            [
                'user' => $client1,
                'zone' => $zoneCotonou,
                'status' => Order::STATUS_DELIVERED,
                'payment_method' => Order::PAYMENT_CASH_ON_DELIVERY,
                'items' => [
                    ['product' => $products[0] ?? null, 'quantity' => 10],
                    ['product' => $products[1] ?? null, 'quantity' => 5],
                ],
                'first_name' => 'Koffi',
                'last_name' => 'Mensah',
                'phone' => '+22997000001',
                'email' => 'client.demo1@elaeis-prestige.test',
                'commune' => 'Cotonou',
                'city' => 'Cotonou',
                'department' => 'Littoral',
                'address_line' => 'Quartier Haie Vive, Rue 340',
                'delivery_note' => 'Appeler à l\'arrivée',
                'comment' => 'Commande de démonstration livrée avec succès.',
            ],
            [
                'user' => $client2,
                'zone' => $zoneCalavi,
                'status' => Order::STATUS_CONFIRMED,
                'payment_method' => Order::PAYMENT_MOBILE_MONEY,
                'items' => [
                    ['product' => $products[2] ?? null, 'quantity' => 20],
                ],
                'first_name' => 'Adjovi',
                'last_name' => 'Hounkpati',
                'phone' => '+22996000002',
                'email' => 'client.demo2@elaeis-prestige.test',
                'commune' => 'Abomey-Calavi',
                'city' => 'Abomey-Calavi',
                'department' => 'Atlantique',
                'address_line' => 'Arconville, face pharmacie',
                'delivery_note' => 'Livraison dans la matinée',
                'comment' => 'Commande de démonstration en cours de préparation.',
            ],
            [
                'user' => null, // Commande invité
                'zone' => $zonePorto,
                'status' => Order::STATUS_PENDING,
                'payment_method' => Order::PAYMENT_CASH_ON_DELIVERY,
                'items' => [
                    ['product' => $products[3] ?? null, 'quantity' => 15],
                    ['product' => $products[4] ?? null, 'quantity' => 8],
                ],
                'first_name' => 'Rodrigue',
                'last_name' => 'Dossou',
                'phone' => '+22995000003',
                'email' => 'rodrigue.dossou@example.test',
                'commune' => 'Porto-Novo',
                'city' => 'Porto-Novo',
                'department' => 'Ouémé',
                'address_line' => 'Quartier Djassin',
                'delivery_note' => 'Près du grand marché',
                'comment' => 'Nouvelle commande en attente de validation.',
            ],
        ];

        foreach ($ordersData as $index => $data) {
            $deliveryFee = $data['zone'] ? (float) $data['zone']->fee : 0.0;
            $subtotal = 0.0;

            $order = Order::create([
                'user_id' => $data['user']?->id,
                'delivery_zone_id' => $data['zone']?->id,
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'commune' => $data['commune'],
                'city' => $data['city'],
                'department' => $data['department'],
                'address_line' => $data['address_line'],
                'delivery_note' => $data['delivery_note'],
                'comment' => $data['comment'],
                'subtotal' => 0,
                'delivery_fee' => $deliveryFee,
                'total' => 0,
                'status' => $data['status'],
                'payment_method' => $data['payment_method'],
                'confirmed_at' => in_array($data['status'], [Order::STATUS_CONFIRMED, Order::STATUS_DELIVERED]) ? now()->subDays(2) : null,
                'delivered_at' => $data['status'] === Order::STATUS_DELIVERED ? now()->subDay() : null,
            ]);

            foreach ($data['items'] as $itemData) {
                $p = $itemData['product'];
                if (! $p) {
                    continue;
                }
                $qty = $itemData['quantity'];
                $itemSubtotal = (float) $p->price * $qty;
                $subtotal += $itemSubtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $p->id,
                    'product_name' => $p->name,
                    'unit_price' => $p->price,
                    'quantity' => $qty,
                    'subtotal' => $itemSubtotal,
                ]);
            }

            $order->update([
                'subtotal' => $subtotal,
                'total' => $subtotal + $deliveryFee,
            ]);

            // Paiement associé
            Payment::create([
                'order_id' => $order->id,
                'method' => $data['payment_method'],
                'status' => $data['status'] === Order::STATUS_DELIVERED ? Payment::STATUS_PAID : Payment::STATUS_PENDING,
                'amount' => $subtotal + $deliveryFee,
                'reference' => 'PAY-DEMO-' . Str::upper(Str::random(8)),
                'paid_at' => $data['status'] === Order::STATUS_DELIVERED ? now()->subDay() : null,
            ]);
        }
    }
}
