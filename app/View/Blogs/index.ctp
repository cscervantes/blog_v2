 <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Latest Posts
                    <small>......</small>
                </h1>

                <!-- First Blog Post -->

                <?php if(count($posts) > 0 ): ?>
                <?php foreach($posts as $post): ?>
                <h2>
                <?php if($this->Session->read('Auth.User.id') === $post['User']['id']): ?>
                    <?= $this->Html->link($post['Post']['title'],'/Posts/edit/'.$post['Post']['id']) ?>
                <?php else: ?>
                    <?= $this->Html->link($post['Post']['title'],'/Posts/edit/'.$post['Post']['id'], array('style' => 'color:black; cursor:default; text-decoration:none', 'onclick' => 'return false')) ?>
                <?php endif; ?>

                </h2>
                <p class="lead">

                    <?php if($this->Session->read('Auth.User.id') === $post['User']['id']): ?>
                        <span>my post <?=$this->Form->postLink(
                            'Delete post',
                            array('controller' => 'Posts', 'action' => 'delete', $post['Post']['id']),
                            array('confirm' => 'Are you sure?')
                        );
                        ?></span>
                    <?php else: ?>
                        by <a href="/"><?= $post['User']['name'] ?></a>
                    <?php endif; ?>

                    
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post['Post']['created'] ?></p>

                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>

                <?php if(strlen($post['Post']['body']) > 100): ?>
                    <p><?= substr($post['Post']['body'], 0, 100) ?></p>
                    <!--<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>-->
                    <?= $this->Html->link(
                    'Read more',
                    '/Posts/view/'.$post['Post']['id'],
                    array('class' => 'btn btn-primary')
                    ) ?>
                <?php else: ?>
                    <p><?= $post['Post']['body'] ?></p>                    
                <?php endif; ?>
                <br>
                 <br>
                <?php if(count($comments) > 0 ): ?>
                <?= $this->Html->link(
                    'Comment',
                    '/Comments/add/'.$post['Post']['id']
                    ); ?>
                <?php foreach($comments as $comment): ?>
                    <?php if($comment['PostComment']['post_id'] === $post['Post']['id']): ?>
                    <p><?= $comment['Comment']['comment'] ?></p>
                    <?php foreach($user as $u): ?>
                        <?php if($u['User']['id'] === $comment['Comment']['user_id']): ?>
                            <p><?= $u['User']['name'] ?>
                            <?php if($this->Session->read('Auth.User.id') === $comment['Comment']['user_id']): ?>
                                <?= 
                                    $this->Html->link(
                                    'Edit comment',
                                    '/Comments/edit/'.$comment['Comment']['id']
                                    )
                                ?> &nbsp; <?= 
                                    $this->Form->postLink(
                                        'Delete comment',
                                        array('controller' => 'Comments', 'action' => 'delete', $comment['Comment']['id'],$comment['PostComment']['id']),
                                        array('confirm' => 'Are you sure?')
                                    );
                                ?>
                            <?php else: continue; ?>

                            <?php endif; ?>

                            </p>
                        <?php else: continue; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php ?>
                    
                    <?php endif; ?>
                <?php endforeach; ?>
 
                <?php else: ?>

                    <?= $this->Html->link(
                    'Comment',
                    '/Comments/add/'.$post['Post']['id']
                    ) ?>

                <?php endif; ?>

                <hr>
                <?php endforeach; ?>
                <?php else: ?>
                    <?=
                    $this->Html->link(
                    'Be the first one to add post',
                    '/Posts/add'
                    )
                     ?>
                <?php endif; ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">            
                                <?php 
                                    if(count($posts) > 0):

                                ?>
                                <?php foreach($posts as $post): ?>
                                <li>
                                <?= $this->Html->link(
                                $post['Post']['title'],
                                array('controller' => 'Posts', 'action' => 'view', $post['Post']['id'])
                                ) ?>
                                </li>

                                <?php endforeach; ?>
                                <?php
                                else: 
                                ?>
                                <li>No posts!</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>