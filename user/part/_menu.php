 <div class="main-sidebar-nav default-navigation">
            <div class="nano">
                <div class="nano-content sidebar-nav">
				     
					<div class="card-body border-bottom text-center nav-profile">
                        <strong>AGENTS</strong>
						<div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                        
                        <img alt="profile" class="margin-b-10  " src="../assets/<?= $user_infos->photo; ?>" width="80">
                        <p class="lead margin-b-0 toggle-none"><?= ucwords($user_infos->nom_complet); ?></p>
                        <p class="text-muted mv-0 toggle-none"><?= ucwords($user_infos->designation); ?></p>						
                    </div>
					
                    <ul class="metisMenu nav flex-column" id="menu">
                        <li class="nav-heading"><span>MAIN</span></li>
						<li class="nav-item active"><a class="nav-link" href="dashboard"><i class="fa fa-home"></i> <span class="toggle-none">Dashboard</span></a></li>						
                        <li class="nav-item">
                            <a class="nav-link"  href="javascript: void(0);" aria-expanded="false"><i class="fa fa-folder-o"></i> <span class="toggle-none">Mes donnees <span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column " aria-expanded="false">
								<li class="nav-item"><a class="nav-link" href="#">Mes taches</a></li>
                                <li class="nav-item"><a class="nav-link" href="doc">Dossier</a></li>
                                <li class="nav-item"><a class="nav-link" href="demande">demandes</a></li>
                                <li class="nav-item"><a class="nav-link" href="conge">Conges</a></li>
                                <li class="nav-item"><a class="nav-link" href="presence">Presences</a></li>
                                <li class="nav-item"><a class="nav-link" href="tache">Evenements</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"  href="javascript: void(0);" aria-expanded="false"><i class="fa fa-folder-o"></i> <span class="toggle-none">Offres <span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column " aria-expanded="false">
								<li class="nav-item"><a class="nav-link" href="offre">Offres</a></li>
                                <li class="nav-item"><a class="nav-link" href="suivie">Candidatures</a></li>
                               
                            </ul>
                        </li>
						
                       
                        
                        <li class="nav-item">
                           <a class="nav-link" href="offre" aria-expanded="false"><i class="fa fa-tasks"></i> <span class="toggle-none">Communiquer</a> 
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="offre" aria-expanded="false"><i class="fa fa-tasks"></i> <span class="toggle-none">Cas sociaux</a> 
                        </li>
                      <!--   <li class="nav-item">
                           <a class="nav-link" href="tache" aria-expanded="false"><i class="fa fa-tasks"></i> <span class="toggle-none">Evenements</a> 
                        </li> -->
                        

                        
                    </ul>
                </div>
            </div>
        </div>