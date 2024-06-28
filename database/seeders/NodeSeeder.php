<?php

namespace Database\Seeders;

use App\Models\Node;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $a = Node::create(['value' => 'a']);
        $b = Node::create(['value' => 'b']);
        $c = Node::create(['value' => 'c']);
        $d = Node::create(['value' => 'd']);

        $a->update(['left_child_id' => $b->id, 'right_child_id' => $c->id]);
        $b->update(['left_child_id' => $d->id]);
    }
}
