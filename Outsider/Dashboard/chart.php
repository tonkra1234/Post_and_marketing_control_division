
<script>
        const Bar = document.getElementById('Bar');
        const Bar_govern = document.getElementById('Bar_govern');
        const Pie_govern = document.getElementById('Pie_govern'); 
        const Pie_private = document.getElementById('Pie_private');
        var year = <?php echo json_encode($Each_year); ?>;
        var number = <?php echo json_encode($sum_year); ?>;

        var year_private = <?php echo json_encode($Each_year_private); ?>;
        var number_private = <?php echo json_encode($sum_year_private); ?>;

        var dzongkhag_govern = <?php echo json_encode($Dzongkhag_govern); ?>;
        var sum_dzongkhag_govern = <?php echo json_encode($Sum_dzongkhag_govern); ?>;

        var dzongkhag_private = <?php echo json_encode($Dzongkhag_private); ?>;
        var sum_dzongkhag_private = <?php echo json_encode($Sum_dzongkhag_private); ?>;

        var dzongkhag_veterinary = <?php echo json_encode($Dzongkhag_veterinary); ?>;
        var sum_dzongkhag_veterinary = <?php echo json_encode($Sum_dzongkhag_veterinary); ?>;
        var label_score = <?php echo json_encode($label_score); ?>;
        var score_2020 = <?php echo json_encode($score_2020); ?>;
        var score_2021 = <?php echo json_encode($score_2021); ?>;
        var score_2022 = <?php echo json_encode($score_2022); ?>;
        var score_2023 = <?php echo json_encode($score_2023); ?>;
        var score_2024 = <?php echo json_encode($score_2024); ?>;

        var g_2020 = <?php echo json_encode($g_2020); ?>;
        var g_2021 = <?php echo json_encode($g_2021); ?>;
        var g_2022 = <?php echo json_encode($g_2022); ?>;
        var g_2023 = <?php echo json_encode($g_2023); ?>;
        var g_2024 = <?php echo json_encode($g_2024); ?>;

        var p_2020 = <?php echo json_encode($p_2020); ?>;
        var p_2021 = <?php echo json_encode($p_2021); ?>;
        var p_2022 = <?php echo json_encode($p_2022); ?>;
        var p_2023 = <?php echo json_encode($p_2023); ?>;
        var p_2024 = <?php echo json_encode($p_2024); ?>;


        Chart.register(ChartDataLabels);
        
        new Chart(Bar_govern, {
            type: 'bar',
            data: {
            labels: [2020,2021,2022,2023,2024],
            datasets: [{
                label: 'Number of inspection each year',
                data: [g_2020,g_2021,g_2022,g_2023,g_2024],
                borderWidth: 1,
            }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        text:'No. inspection',
                        display:true,
                        font: {
                            size: 12,
                            weight: "bold"
                        }
                    }
                },
                x: {
                    beginAtZero: true,
                    title: {
                        text:'year',
                        display:true,
                        font: {
                            size: 16,
                            weight: "bold"
                        }
                    }
                }
            }, 
            plugins: {
                datalabels: { // This code is used to display data values
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 16
                        }
                    }
                }
            }
        });

        new Chart(Bar_private, {
            type: 'bar',
            data: {
            labels: [2020,2021,2022,2023,2024],
            datasets: [{
                label: 'Number of inspection each year',
                data: [p_2020,p_2021,p_2022,p_2023,p_2024],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        text:'No. inspection',
                        display:true,
                        font: {
                            size: 12,
                            weight: "bold"
                        }
                    }
                },
                x: {
                    beginAtZero: true,
                    title: {
                        text:'year',
                        display:true,
                        font: {
                            size: 16,
                            weight: "bold"
                        }
                    }
                }
            },
            plugins: {
                datalabels: { // This code is used to display data values
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 16
                        }
                    }
                }
            }
        });

        new Chart(Pie_govern, {
            type: 'bar',
            data: {
            labels: dzongkhag_govern,
            datasets: [{
                label: 'Number of government facility in Bhutan( Human )',
                data: sum_dzongkhag_govern,
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(26, 188, 156 )',
                'rgb(164, 128, 255 )',
                'rgb(74, 123, 214 )',
                'rgb(74, 214, 112 )',
                'rgb(100, 254, 205 )',
                'rgb(237, 156, 253 )',
                'rgb(243, 126, 223 )',
                'rgb(251, 90, 131 )',
                'rgb(230, 241, 96 )',
                'rgb(200, 126, 32 )',
                'rgb(134, 180, 60 )',
                'rgb(130, 10, 171 )',
                'rgb(129, 129, 129 )',
                'rgb(229, 152, 102 )',
                'rgb(72, 201, 176 )',
                'rgb(93, 173, 226 )',
                'rgb(153, 163, 164 )',
                'rgb(26, 188, 156 )',
                'rgb(212, 172, 13 )'
                ],
                hoverOffset: 4
                }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        text:'No. government facility(Human)',
                        display:true,
                        font: {
                            size: 12,
                            weight: "bold"
                        }
                    },
                    suggestedMax: <?php echo max($Sum_dzongkhag_govern)+2;?>
                },
                x: {
                    beginAtZero: true,
                    title: {
                        text:'Dzongkhag',
                        display:true,
                        font: {
                            size: 16,
                            weight: "bold"
                        }
                    }
                }
            },
            plugins: {
                datalabels: { // This code is used to display data values
                    anchor: 'end',
                    align: 'top',
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 16
                        }
                    }
                }
            
            }
        });
        new Chart(Pie_private, {
            type: 'bar',
            data: {
            labels: dzongkhag_private,
            datasets: [{
                label: 'Number of private facility in Bhutan',
                data: sum_dzongkhag_private,
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(26, 188, 156 )',
                'rgb(164, 128, 255 )',
                'rgb(74, 123, 214 )',
                'rgb(74, 214, 112 )',
                'rgb(100, 254, 205 )',
                'rgb(237, 156, 253 )',
                'rgb(243, 126, 223 )',
                'rgb(251, 90, 131 )',
                'rgb(230, 241, 96 )',
                'rgb(200, 126, 32 )',
                'rgb(134, 180, 60 )',
                'rgb(130, 10, 171 )',
                'rgb(129, 129, 129 )',
                'rgb(229, 152, 102 )',
                'rgb(72, 201, 176 )',
                'rgb(93, 173, 226 )',
                'rgb(153, 163, 164 )',
                'rgb(26, 188, 156 )',
                'rgb(212, 172, 13 )'
                ],
                hoverOffset: 4
                }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        text:'No. private facility',
                        display:true,
                        font: {
                            size: 12,
                            weight: "bold"
                        }
                    },
                    suggestedMax: <?php echo max($Sum_dzongkhag_private)+2;?>
                },
                x: {
                    beginAtZero: true,
                    title: {
                        text:'Dzongkhag',
                        display:true,
                        font: {
                            size: 16,
                            weight: "bold"
                        }
                    }
                }
            },
            plugins: {
                datalabels: { // This code is used to display data values
                    anchor: 'end',
                    align: 'top',
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 16
                        }
                    }
                }
            
            }
        });
        new Chart(Bar_veterinary, {
            type: 'bar',
            data: {
            labels: dzongkhag_veterinary,
            datasets: [{
                label: 'Number of government facility in Bhutan (Veterinary)',
                data: sum_dzongkhag_veterinary,
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(26, 188, 156 )',
                'rgb(164, 128, 255 )',
                'rgb(74, 123, 214 )',
                'rgb(74, 214, 112 )',
                'rgb(100, 254, 205 )',
                'rgb(237, 156, 253 )',
                'rgb(243, 126, 223 )',
                'rgb(251, 90, 131 )',
                'rgb(230, 241, 96 )',
                'rgb(200, 126, 32 )',
                'rgb(134, 180, 60 )',
                'rgb(130, 10, 171 )',
                'rgb(129, 129, 129 )',
                'rgb(229, 152, 102 )',
                'rgb(72, 201, 176 )',
                'rgb(93, 173, 226 )',
                'rgb(153, 163, 164 )',
                'rgb(26, 188, 156 )',
                'rgb(212, 172, 13 )'
                ],
                hoverOffset: 4
                }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        text:'No. government facility (VET)',
                        display:true,
                        font: {
                            size: 12,
                            weight: "bold"
                        }
                    },
                    suggestedMax: <?php echo max($Sum_dzongkhag_veterinary)+2;?>

                },
                x: {
                    beginAtZero: true,
                    title: {
                        text:'Dzongkhag',
                        display:true,
                        font: {
                            size: 16,
                            weight: "bold"
                        }
                    }
                },   
            },
            plugins: {
                datalabels: { // This code is used to display data values
                    anchor: 'end',
                    align: 'top',
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 16
                        }
                    }
                }
            
            }
        });

        new Chart(Bar_compliance, {
            type: 'bar',
            data: {
            labels: label_score ,
            datasets: [{
                label: '2020',
                data: score_2020,
                backgroundColor: [
                'rgb(54, 162, 235)'
                ],
                hoverOffset: 4
                },
                {
                label: '2021',
                data: score_2021,
                backgroundColor: [
                'rgb(255, 99, 132)'
                ],
                hoverOffset: 4
                },
                {
                label: '2022',
                data: score_2022,
                backgroundColor: [
                'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
                },
                {
                label: '2023',
                data: score_2023,
                backgroundColor: [
                'rgb(74, 214, 112 )'
                ],
                hoverOffset: 4
                },
                {
                label: '2024',
                data: score_2024,
                backgroundColor: [
                'rgb(196, 196, 196)'
                ],
                hoverOffset: 4
                }
            ]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        text:'Percentage',
                        display:true,
                        font: {
                            size: 12,
                            weight: "bold"
                        }
                    },
                    suggestedMax: <?php echo max($Sum_dzongkhag_veterinary)+2;?>

                },
                x: {
                    beginAtZero: true,
                    title: {
                        text:'Year',
                        display:true,
                        font: {
                            size: 16,
                            weight: "bold"
                        }
                    }
                },   
            },
            plugins: {
                datalabels: { // This code is used to display data values
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 10
                        }
                    }
                }
            
            }
        });

</script>