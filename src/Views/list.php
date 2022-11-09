<?php
echo get_header( [ 'title' => 'Accueil' ] );

/**
 * @var TaskEntity[] $tasks
 * @var  array $params
 */

//var_dump($tasks)
;


?>
    <div class="container mx-auto flex flex-row items-stretch space-x-8">
        <!-- Filters -->
        <aside class="block w-1/4 mt-[7.1rem]">
            <?= get_template( __PROJECT_ROOT__ . "/Views/fragments/filter-form.php", [
                // TODO y aura sûrement un truc à faire ici 🤔
            ] ); ?>
        </aside>
        <!-- /Filters -->

        <main class="container mx-auto flex-1">
            <!-- Header + Search Form -->
            <header class="flex flex-row mt-8 items-center justify-space-between  mb-8">
                <h1 class="text-2xl font-bold uppercase tracking-widest flex-1">
                    Tâches
                </h1>

                <a class="p-4 rounded bg-teal-400 hover:bg-teal-500 duration-300 transition-colors flex items-center font-medium text-sm uppercase text-white tracking-widest justify-center" href="/task">
                    Créer <i class="iconoir-add-circled-outline block ml-2 text-xl"></i>
                </a>
            </header>

            <?php
            //$datesss=date('d/m/y');
            $tabs=array();
            foreach ($tasks as $task){
                $date=$task->getCreatedAt();
                $dates=new dateTime($date);
                $date=$dates->format('d/m/y');
                if(!isset($date)||$date!==$task->getCreatedAt()){

                    if(!in_array($date,$tabs)){
                        echo $date;
                        array_push($tabs,$date);
                    }




                    //echo $date;
                    //$date=$date->getformat('d/m/y');

                }


                echo get_template( __PROJECT_ROOT__ . "/Views/fragments/task-card.php", [
                'task' =>  $task]);
            }

             ?>

                <!-- Pagination + Submit -->
                <div class="flex flex-row justify-space-between items-center">
                    <!-- Submit -->
                    <button type="submit" class="p-4 rounded bg-teal-400 hover:bg-teal-500 duration-300 transition-colors flex items-center font-medium text-sm uppercase text-white tracking-widest justify-center">
                        Enregistrer <i class="iconoir-save-floppy-disk block ml-2 text-xl"></i>
                    </button>
                    <?php var_dump(http_build_query($_GET))?>
                    <!-- Pagination -->
                    <div class="flex-1 flex flex-row justify-end space-x-4 my-8">
                        <a href="http://localhost/?page=1&<?php echo http_build_query($params);?>" class="block bg-slate-50 hover:bg-slate-200 rounded p-4 text-sm cursor-pointer transition-colors duration-300">
                            1
                        </a>
                        <a href="http://localhost/?page=2" class="block bg-slate-50 hover:bg-slate-200 rounded p-4 text-sm cursor-pointer transition-colors duration-300">
                            2
                        </a>
                        <a href="http://localhost/?page=3" class="block bg-slate-50 hover:bg-slate-200 rounded p-4 text-sm cursor-pointer transition-colors duration-300">
                            3
                        </a>
                    </div>
                </div>
                <!-- /Pagination -->


            </form>
        </main>
    </div>
<?php echo get_footer(); ?>